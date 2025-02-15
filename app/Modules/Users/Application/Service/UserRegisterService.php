<?php

namespace Modules\Users\Application\Service;

use Modules\Users\Domain\User;
use Modules\Users\Infrastructure\Out\Persistence\Repository\UserRepository;
use Modules\Common\Audit\Enum\AuditTypeEnum;
use Modules\Notifications\Application\Service\GetNotificationService;
use Modules\Notifications\Application\Service\NotificationService;
use Modules\Notifications\Application\Service\UpdateNotificationService;
use Modules\Notifications\Domain\NotificationData;
use Config\Services;
use Exception;
use DateTime;

class UserRegisterService
{
    protected $userRepository;
    protected $notificationService;
    protected $getNotificationService;
    protected $updateNotificationService;
    protected $session;
    protected $logger;

    public function __construct(
        UserRepository $userRepository,
        NotificationService $notificationService,
        GetNotificationService $getNotificationService,
        UpdateNotificationService $updateNotificationService
    ) {
        $this->userRepository = $userRepository;
        $this->notificationService = $notificationService;
        $this->getNotificationService = $getNotificationService;
        $this->updateNotificationService = $updateNotificationService;
        $this->logger = Services::logger();
    }

    public function registerUser(User $user)
    {
        try {
            // Genera la data para la notificacion
            $notificationData = $this->createNotificationData($user);
            // Guarda al usuario
            $savedUser = $this->userRepository->save($user);
            if (!$savedUser["success"]) {
                return errorResponse($savedUser["message"]);
            }
            // Se guardan los datos del registro en auditoria
            auditEventTrigger(AuditTypeEnum::TYPE_REGISTER, "Creación de cuenta <{$user->usuario}>", $savedUser["data"]);
            // Envia la notificacion
            $this->notificationService->send($notificationData);
            // Guarda al usuario
            return successResponse($savedUser);
        } catch (Exception $e) {
            $this->logger->error("UserRegisterService -> registerUser: {$e->getMessage()}");
            return errorResponse($e->getMessage());
        }
    }

    private function createNotificationData(User $user)
    {
        $notificationData = new NotificationData();
        $notificationData->to = $user->email;
        $notificationData->templateCode = "EMAIL_CONF_ACCOUNT";
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

    public function resetPassword($userId){
        try {
            // Buscamos el usuario por id
            $userFound = $this->userRepository->findById($userId);
            if (!$userFound["success"]) {
                return errorResponse($userFound["message"]);
            }
            $userData = $userFound["data"];
            $user = new User($userData);
            // Genera la data para la notificacion
            $notificationData = $this->createNotificationResetPasswordData($user);
            // Se guardan los datos del registro en auditoria
            auditEventTrigger(AuditTypeEnum::TYPE_RESET_PASSWORD , "Reseteo contraseña <{$user->usuario}>");
            // Envia la notificacion
            $this->notificationService->send($notificationData);
            // Guarda al usuario
            return successResponse($userData);
        } catch (Exception $e) {
            $this->logger->error("UserRegisterService -> resetPassword: {$e->getMessage()}");
            return errorResponse($e->getMessage());
        }
    }

    private function createNotificationResetPasswordData(User $user)
    {
        $notificationData = new NotificationData();
        $notificationData->to = $user->email;
        $notificationData->templateCode = "EMAIL_RESET_PWD";
        $notificationData->username = $user->usuario;
        $notificationData->templateData = [
            "nombre" => $user->getFullName(),
            "email" => $user->email
        ];
        return $notificationData;
    }

    public function confirmPassword(string $username, string $password, string $email)
    {
        $fecact = new DateTime();
        try {
            // buscamos el usuario con el username
            $userFound = $this->userRepository->findByUsername($username);
            if (!$userFound["success"]) {
                return errorResponse($userFound["message"]);
            }
            $userData = new User($userFound["data"]);
            // Se actualiza el usuario con la contraseña
            $userData->passwd = password_hash($password, PASSWORD_BCRYPT);
            $userData->confirmado = 1;
            $userData->flastpwd = $fecact->format('Y-m-d H:i:s');
            $savedUser = $this->userRepository->save($userData);
            if (!$savedUser["success"]) {
                return errorResponse($savedUser["message"]);
            }
            // Buscamos las notificiones asociadas al correo electronico indicado
            $notificationsFound = $this->getNotificationService->getByEmailAndUsername($email, $username);
            if (!$notificationsFound["success"]) {
                return errorResponse($notificationsFound["message"]);
            }
            // Si hay notificaciones las desactivamos
            foreach ($notificationsFound["data"] as $notification) {
                $this->updateNotificationService->disableNotification($notification->idnotificacion);
            }
            // Se guardan los datos del registro en auditoria
            auditEventTrigger(AuditTypeEnum::TYPE_PASSWORD, "Creación de contraseña");
            // Confirmacion del proceso
            return successResponse($savedUser);
        } catch (Exception $e) {
            $this->logger->error("UserRegisterService -> confirmPassword: {$e->getMessage()}");
            return errorResponse($e->getMessage());
        }
    }
}
