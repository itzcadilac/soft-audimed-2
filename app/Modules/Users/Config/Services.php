<?php

namespace Modules\Users\Config;

use CodeIgniter\Config\BaseService;
use Modules\Users\Application\Service\UserRegisterService;
use Modules\Users\Infrastructure\Out\Persistence\Repository\UserRepository;
use Modules\Users\Application\Service\ModuleByProfileService;
use Modules\Users\Application\Service\ProfileService;
use Modules\Users\Application\Service\UserService;
use Modules\Users\Infrastructure\Out\Persistence\Repository\ModuleByProfileRepository;
use Modules\Users\Infrastructure\Out\Persistence\Repository\ProfileRepository;

class Services extends BaseService
{

    public static function userService()
    {
        if (static::hasInstance('userService')) {
            return static::getSharedInstance('userService');
        }

        $userRepository = new UserRepository();

        return new UserService($userRepository);
    }

    public static function registerUserService()
    {
        if (static::hasInstance('registerUserService')) {
            return static::getSharedInstance('registerUserService');
        }

        $userRepository = new UserRepository();

        return new UserRegisterService($userRepository);
    }

    public static function moduleByProfileService()
    {
        if (static::hasInstance('moduleByProfileService')) {
            return static::getSharedInstance('moduleByProfileService');
        }

        $moduleByProfileRepository = new ModuleByProfileRepository();

        return new ModuleByProfileService($moduleByProfileRepository);
    }

    public static function profileService(){
        if (static::hasInstance('profileService')) {
            return static::getSharedInstance('profileService');
        }

        $profileRepository = new ProfileRepository();
        
        return new ProfileService($profileRepository);
    }
}
