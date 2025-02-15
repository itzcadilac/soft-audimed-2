<?php

namespace Modules\Security\Application\Service;

use CodeIgniter\Events\Events;
use CodeIgniter\Session\Session;
use Config\Services;
use Exception;
use Modules\Common\Audit\Enum\AuditTypeEnum;
use Modules\Notifications\Application\Service\NotificationService;
use Modules\Notifications\Domain\NotificationData;
use Modules\Security\Infrastructure\Out\Persistence\Repository\PasswordRecoveryRepository;
use Modules\Users\Domain\User;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class PasswordRecoveryService
{
    protected $passwordRecoveryRepository;
    protected $notificationService;

    public function __construct(PasswordRecoveryRepository $passwordRecoveryRepository,NotificationService $notificationService,)
    {
        $this->passwordRecoveryRepository = $passwordRecoveryRepository;
        $this->notificationService = $notificationService;
    }

    public function findByEmailAndIdentity($email, $identityNumber, $userSelect)
    {
        try {

            $content = [
                'numero_documento' => $identityNumber,
                'email' => $email,
            ];
            
            // Convertir el array a JSON
            $content = json_encode($content, JSON_UNESCAPED_UNICODE);

            $user = $this->passwordRecoveryRepository->findByEmailAndIdentity($email, $identityNumber, $userSelect);
            
            if (!$user) {
                Events::trigger('registrar_auditoria',AuditTypeEnum::TYPE_RECOVERY, 'Intento de recuperación de contraseña', $content );
                return errorResponse('Registro no encontrado');
            }

            if (count($user) > 1) {
                return successResponse($user, 'Seleccione la cuenta a recuperar');
            }

            $token = $this->generateRecoveryToken($user[0]['usuario'], $email, $identityNumber);
            Events::trigger('registrar_auditoria',AuditTypeEnum::TYPE_RECOVERY, 'Recuperación de contraseña', $content );

            $this->sendNotification($user); //aca se crea la notificacion, se registra el correo y se envia el correo

            //$this->sendRecoveryEmail($email, $identityNumber, $token); //YA NO SE ENVIA EL EMAIL DE ESTA FORMA
            return successResponse([], 'Correo de recuperación enviado');
        } catch (Exception $e) {
            return errorResponse('Error en la recuperación de contraseña');
        }
    }

    public function generateRecoveryToken($userId, $email, $identityNumber)
    {
        $token = bin2hex(random_bytes(32));
        $this->passwordRecoveryRepository->saveRecoveryToken($userId, $email, $token);
        return $token;
    }

    public function sendRecoveryEmail($email, $identityNumber, $token)
    {
        
        $emailService = \Config\Services::email();

        $emailService->setTo($email);
        $emailService->setSubject('Recuperación de Contraseña');
    
            // Usa el servicio de renderizado de Twig
        $loader = new FilesystemLoader(APPPATH . 'Views');
        $twig = new Environment($loader);

        $view = $twig->render('emails/recovery.twig', [
            'identityNumber' => $identityNumber,
            'token' => $token,
            'base_url' => base_url(),
        ]);
    
        $emailService->setMessage($view);
        $emailService->setMailType('html'); // Enviar como HTML
    
        if (!$emailService->send()) {
            log_message('error', 'Error al enviar el correo de recuperación: ' . $emailService->printDebugger());
        }
    }

    public function resetPassword($token, $newPassword)
    {
        try {
            $isValid = $this->passwordRecoveryRepository->validateToken($token);
            if (!$isValid) {
                return errorResponse('Enlace no válido');
            }

            $userId = $isValid['usuario'];
            $this->passwordRecoveryRepository->updatePassword($userId, password_hash($newPassword, PASSWORD_BCRYPT));
            $this->passwordRecoveryRepository->deleteToken($token,$userId);
            Events::trigger('registrar_auditoria',AuditTypeEnum::TYPE_PASSWORD, 'Contraseña actualizada por el usuario”.' );
            //$this->sendConfirmationEmail($isValid['email']);
            return successResponse([], 'Se ha realizado satisfactoriamente el cambio de contraseña.');
        } catch (Exception $e) {
            return errorResponse('Error al actualizar la contraseña');
        }
    }

    public function sendConfirmationEmail($email)
    {
        $emailService = \Config\Services::email();
        
        $emailService->setTo($email);
        $emailService->setSubject('Contraseña Actualizada');
        
        $view = view('emails/confirmation.twig');

        $emailService->setMessage($view);
        $emailService->setMailType('html');
        
        if (!$emailService->send()) {
            log_message('error', 'Error al enviar el correo de confirmación: ' . $emailService->printDebugger());
        }
    }

    function sendNotification($userData){

        // Verifica si encontró un usuario
        if (!empty($userData)) {
            $user = new User();
            $user->fill($userData[0]);
        } else {
            $user = null;
        }

        $notificationData = $this->createNotificationData($user);

        $this->notificationService->send($notificationData);

    }

    private function createNotificationData(User $user)
    {
        $notificationData = new NotificationData();
        $notificationData->to = $user->email;
        $notificationData->templateCode = "EMAIL_CHANGE_PWD";
        $notificationData->username = $user->usuario;
        $notificationData->subjectData = [
            "nombre" => $user->nombres
        ];
        $notificationData->templateData = [
            "nombre" => $user->getFullName(),
            "email" => $user->email
        ];
        return $notificationData;
    }
}