<?php

namespace Modules\Gestion\Config;

use CodeIgniter\Config\BaseService;
use Modules\Notifications\Application\Service\GetNotificationService;
use Modules\Notifications\Application\Service\UpdateNotificationService;
use Modules\Notifications\Config\Services as NotificationServices;
use Modules\Gestion\Infrastructure\Out\Persistence\Repository\GestionRepository;
use Modules\Gestion\Application\Service\GestionService;

class Services extends BaseService
{
	protected $gestionRepository;

    public static function gestionService()
    {
        if (static::hasInstance('gestionService')) {
            return static::getSharedInstance('gestionService');
        }

        $gestionRepository = new GestionRepository();

        return new GestionService($gestionRepository);
    }

    /*public static function userRegisterService()
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
    }*/
}
