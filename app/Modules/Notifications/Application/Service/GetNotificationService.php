<?php

namespace Modules\Notifications\Application\Service;

use Exception;
use Modules\Notifications\Infrastructure\Out\Persistence\Repository\NotificationRepository;

class GetNotificationService {
    protected $notificationRepository;

    public function __construct(NotificationRepository $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
    }

    public function getByUuidAndEmail($uuid, $email){
        try{
            return $this->notificationRepository->findByUuidAndEmail($uuid, $email);
        }catch(Exception $e){
            return errorResponse();
        }
    }
}