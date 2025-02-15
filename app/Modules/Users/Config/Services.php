<?php

namespace Modules\Users\Config;

use CodeIgniter\Config\BaseService;
use Modules\Notifications\Application\Service\GetNotificationService;
use Modules\Notifications\Application\Service\UpdateNotificationService;
use Modules\Users\Application\Service\DocumentTypeService;
use Modules\Users\Application\Service\UserRegisterService;
use Modules\Users\Infrastructure\Out\Persistence\Repository\UserRepository;
use Modules\Users\Application\Service\ModuleByProfileService;
use Modules\Users\Application\Service\ProfileService;
use Modules\Users\Application\Service\UserService;
use Modules\Users\Application\Service\ValidateDocumentService;
use Modules\Users\Infrastructure\Out\Persistence\Repository\DocumentTypeRepository;
use Modules\Users\Infrastructure\Out\Persistence\Repository\ModuleByProfileRepository;
use Modules\Users\Infrastructure\Out\Persistence\Repository\PersonRepository;
use Modules\Users\Infrastructure\Out\Persistence\Repository\ProfileRepository;
use Modules\Users\Infrastructure\Out\Web\PersonAdapter;
use Modules\Users\Infrastructure\Out\Persistence\Repository\StatusRegRepository;
use Modules\Notifications\Config\Services as NotificationServices;
use Modules\Users\Application\Service\ParametersService;

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

    public static function userRegisterService()
    {
        if (static::hasInstance('userRegisterService')) {
            return static::getSharedInstance('userRegisterService');
        }

        $userRepository = new UserRepository();
        $notificationService = NotificationServices::notificationService();
        $getNotificationService = NotificationServices::getNotificationService();
        $updateNotificationService = NotificationServices::updateNotificationService();

        return new UserRegisterService($userRepository, $notificationService, $getNotificationService, $updateNotificationService);
    }

    public static function moduleByProfileService()
    {
        if (static::hasInstance('moduleByProfileService')) {
            return static::getSharedInstance('moduleByProfileService');
        }

        $moduleByProfileRepository = new ModuleByProfileRepository();

        return new ModuleByProfileService($moduleByProfileRepository);
    }

    public static function profileService()
    {
        if (static::hasInstance('profileService')) {
            return static::getSharedInstance('profileService');
        }

        $profileRepository = new ProfileRepository();

        return new ProfileService($profileRepository);
    }

    public static function documentTypeService()
    {
        if (static::hasInstance('documentTypeService')) {
            return static::getSharedInstance('documentTypeService');
        }

        $documentTypeRepository = new DocumentTypeRepository();

        return new DocumentTypeService($documentTypeRepository);
    }

    public static function validateDocumentService()
    {
        if (static::hasInstance('validateDocumentService')) {
            return static::getSharedInstance('validateDocumentService');
        }

        $personRepository = new PersonRepository();
        $personAdapter = new PersonAdapter();

        return new ValidateDocumentService($personRepository, $personAdapter);
    }

    public static function parametersService()
    {
        if (static::hasInstance('parametersService')) {
            return static::getSharedInstance('parametersService');
        }

        $parametersRepository = new StatusRegRepository();

        return new ParametersService($parametersRepository);
    }
}
