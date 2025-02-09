<?php

namespace Modules\Notifications\Config;

use CodeIgniter\Config\BaseService;
use Modules\Notifications\Application\Service\GetNotificationService;
use Modules\Notifications\Application\Service\NotificationService;
use Modules\Notifications\Infrastructure\Out\Persistence\Repository\NotificationRepository;
use Modules\Notifications\Infrastructure\Out\Persistence\Repository\TemplateRepository;
use Modules\Notifications\Infrastructure\Out\Web\NotificationAdapter;

class Services extends BaseService
{

    public static function NotificationService(){
        if (static::hasInstance('NotificationService')) {
            return static::getSharedInstance('NotificationService');
        }

        $notificationRespsitory = new NotificationRepository();
        $templateRepository = new TemplateRepository();
        $notificationAdapter = new NotificationAdapter();

        return new NotificationService($notificationRespsitory, $templateRepository, $notificationAdapter);
    }

    public static function getNotificationService(){
        if (static::hasInstance('getNotificationService')) {
            return static::getSharedInstance('getNotificationService');
        }

        $notificationRespsitory = new NotificationRepository();

        return new GetNotificationService($notificationRespsitory);
    }
}
