<?php

namespace Modules\Notifications\Infrastructure\Out\Web;

use Modules\Notifications\Infrastructure\Out\Web\Client\NotificationEmailClient;
use Modules\Notifications\Infrastructure\Out\Web\Entity\NotificationEmail;
use Exception;

class NotificationAdapter
{
    protected $notificationEmailClient;

    public function __construct()
    {
        $this->notificationEmailClient = new NotificationEmailClient();
    }

    public function sendNotificationByEmail($notificationData)
    {
        try {
            $notificationByEmail = new NotificationEmail($notificationData->toArray());
            $notificationSent = $this->notificationEmailClient->send($notificationByEmail);
            if(!$notificationSent["success"]){
                return errorResponse($notificationSent["message"]);
            }
            return successResponse($notificationData);
        } catch (Exception $e) {
            return errorResponse();
        }
    }
}
