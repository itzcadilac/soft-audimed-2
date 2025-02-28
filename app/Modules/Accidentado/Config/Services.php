<?php

namespace Modules\Accidentado\Config;

use CodeIgniter\Config\BaseService;
use Modules\Users\Application\Service\DocumentTypeService;
use Modules\Accidentado\Infrastructure\Out\Persistence\Repository\AccidentadoRepository;
use Modules\Users\Application\Service\ModuleByProfileService;
use Modules\Users\Application\Service\ProfileService;
use Modules\Accidentado\Application\Service\AccidentadoService;
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

    public static function accidentadoService()
    {
        if (static::hasInstance('accidentadoService')) {
            return static::getSharedInstance('accidentadoService');
        }

        $accidentadoRepository = new AccidentadoRepository();

        return new AccidentadoService(accidentadoRepository: $accidentadoRepository);
    }

}
