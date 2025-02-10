<?php

namespace Modules\Users\Application\Service;

use CodeIgniter\Events\Events;
use Modules\Users\Domain\User;
use Modules\Users\Infrastructure\Out\Persistence\Repository\UserRepository;
use Modules\Common\Audit\Entity\Audit;
use Modules\Common\Audit\Enum\AuditTypeEnum;
use Modules\Notifications\Config\Services as NotificationServices;
use Modules\Notifications\Domain\NotificationData;
use Exception;

class UserRegisterService
{
    protected $userRepository;
    protected $notificationService;
    protected $session;

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
            // Se guardan los datos del registro en auditoria
            auditEventTrigger(AuditTypeEnum::TYPE_REGISTER, $savedUser["data"], "Creación de cuenta <{$user["usuario"]}>");
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
