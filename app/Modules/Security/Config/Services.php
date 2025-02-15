<?php

namespace Modules\Security\Config;

use CodeIgniter\Config\BaseService;
use Modules\Security\Application\Service\LoginService;
use Modules\Security\Application\Service\PasswordRecoveryService;
use Modules\Security\Application\Service\RecoverPasswordService;
use Modules\Security\Infrastructure\Out\Persistence\Repository\PasswordRecoveryRepository;

use Modules\Notifications\Config\Services as NotificationServices;

class Services extends BaseService
{
    public static function loginService()
    {
        if (static::hasInstance('loginService')) {
            return static::getSharedInstance('loginService');
        }

        $session = service('session');

        return new LoginService($session);
    }

    public static function passwordRecoveryService()
    {
        if (static::hasInstance('PasswordRecoveryService')) {
            return static::getSharedInstance('PasswordRecoveryService');
        }

        $notificationService = NotificationServices::notificationService();
        $passwordRecoveryRepository = new PasswordRecoveryRepository();
        return new PasswordRecoveryService($passwordRecoveryRepository,$notificationService);
    }
}
