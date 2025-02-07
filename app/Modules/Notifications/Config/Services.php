<?php

namespace Modules\Notifications\Config;

use CodeIgniter\Config\BaseService;
use Modules\Notifications\Application\Service\EmailService;
use Modules\Notifications\Application\Service\NotificationUserService;
use Modules\Notifications\Infrastructure\Out\Persistence\Repository\NotificationRepository;
use Modules\Notifications\Infrastructure\Out\Persistence\Repository\TemplateRepository;

class Services extends BaseService
{

    public static function emailService()
    {
        if (static::hasInstance('emailService')) {
            return static::getSharedInstance('emailService');
        }

        return new EmailService();
    }

    public static function notificationUserService(){
        if (static::hasInstance('notificationUserService')) {
            return static::getSharedInstance('notificationUserService');
        }

        $notificationRespsitory = new NotificationRepository();
        $templateRepository = new TemplateRepository();
        $emailService = new EmailService();

        return new NotificationUserService($notificationRespsitory, $templateRepository, $emailService);
    }
}
