<?php

namespace Modules\Users\Application\Service;

use Modules\Users\Domain\User;
use Modules\Users\Infrastructure\Out\Persistence\Repository\UserRepository;
use Exception;

use Modules\Notifications\Config\Services as NotificationServices;
use Modules\Notifications\Domain\NotificationData;

class UserRegisterService
{
    protected $userRepository;
    protected $notificationService;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->notificationService = NotificationServices::notificationService();
    }

    public function registerUser(User $user)
    {
        try {
            // Genera la data para la notificacion
            $notificationData = $this->createNotificationData($user);
            // Guarda al usuario
            $savedUser = $this->userRepository->save($user);
            if(!$savedUser["success"]){
                return errorResponse($savedUser["message"]);
            }
            // Envia la notificacion
            $this->notificationService->send($notificationData);
            // Guarda al usuario
            return successResponse($savedUser);
        } catch (Exception $e) {
            return errorResponse();
        }
    }

    private function createNotificationData(User $user){
        $notificationData = new NotificationData();
        $notificationData->to = $user->email;
        $notificationData->templateCode = "EMAIL_CONF_ACCOUNT";
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
