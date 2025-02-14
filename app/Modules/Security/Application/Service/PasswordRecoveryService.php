<?php

namespace Modules\Security\Application\Service;

use CodeIgniter\Events\Events;
use CodeIgniter\Session\Session;
use Config\Services;
use Exception;
use Modules\Security\Infrastructure\Out\Persistence\Repository\PasswordRecoveryRepository;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class PasswordRecoveryService
{
    protected $passwordRecoveryRepository;

    public function __construct(PasswordRecoveryRepository $passwordRecoveryRepository)
    {
        $this->passwordRecoveryRepository = $passwordRecoveryRepository;
    }

    public function findByEmailAndIdentity($email, $identityNumber, $userSelect)
    {
        try {
            $user = $this->passwordRecoveryRepository->findByEmailAndIdentity($email, $identityNumber, $userSelect);
            
            if (!$user) {
                return errorResponse('Registro no encontrado');
            }

            if (count($user) > 1) {
                return successResponse($user, 'Seleccione la cuenta a recuperar');
            }

            $token = $this->generateRecoveryToken($user[0]['usuario'], $email, $identityNumber);
            $this->sendRecoveryEmail($email, $identityNumber, $token);
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
            //$this->sendConfirmationEmail($isValid['email']);
            return successResponse([], 'Contraseña actualizada correctamente');
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
}