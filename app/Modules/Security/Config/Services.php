<?php

namespace Modules\Security\Config;

use CodeIgniter\Config\BaseService;
use Modules\Security\Application\Service\LoginService;

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
}
