<?php

namespace Modules\Notifications\Application\Service;

use Exception;
use Modules\Notifications\Domain\Notification;
use Modules\Notifications\Infrastructure\Out\Persistence\Repository\NotificationRepository;

class UpdateNotificationService
{
    protected $notificationRepository;

    public function __construct(NotificationRepository $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
    }

    public function disableNotification($notificationId)
    {
        try {
            $notificationFound = $this->notificationRepository->findById($notificationId);
            if(!$notificationFound["success"]){
                return errorResponse($notificationFound["message"]);
            }
            $notification = new Notification($notificationFound["data"]);
            $notification->activo = 0;
            $this->notificationRepository->save($notification); 
            return successResponse("La notificacion se desactivo correctamente");
        } catch (Exception $e) {
            return errorResponse();
        }
    }
}
