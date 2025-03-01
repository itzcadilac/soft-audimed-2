<?php

namespace Modules\Gestion\Config;

use CodeIgniter\Config\BaseService;
use Modules\Gestion\Infrastructure\Out\Persistence\Repository\GestionRepository;
use Modules\Gestion\Application\Service\GestionService;
use Modules\Gestion\Application\Service\GestionRegisterService;

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

    public static function gestionRegisterService()
    {
        if (static::hasInstance('gestionRegisterService')) {
            return static::getSharedInstance('gestionRegisterService');
        }

        $gestionRepository = new GestionRepository();

        return new GestionRegisterService($gestionRepository);
    }
    /*
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
