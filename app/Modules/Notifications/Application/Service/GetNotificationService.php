<?php

namespace Modules\Notifications\Application\Service;

use Modules\Notifications\Infrastructure\Out\Persistence\Repository\NotificationRepository;
use Config\Services;
use Exception;

class GetNotificationService {
    protected $notificationRepository;
    protected $logger;

    public function __construct(NotificationRepository $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
        $this->logger = Services::logger();
    }

    public function getByUuidAndEmail(string $uuid, string $email){
        try{
            return $this->notificationRepository->findByUuidAndEmail($uuid, $email);
        }catch(Exception $e){
            $this->logger->error("GetNotificationService -> getByUuidAndEmail: {$e->getMessage()}");
            return errorResponse();
        }
    }

    public function getByEmailAndUsername(string $email, string $username){
        try{
            return $this->notificationRepository->findByEmailAndUsername($email, $username);
        }catch(Exception $e){
            $this->logger->error("GetNotificationService -> getByEmailAndUsername: {$e->getMessage()}");
            return errorResponse();
        }
    }
}