<?php

namespace Modules\Aseguradora\Config;

use CodeIgniter\Config\BaseService;
use Modules\Aseguradora\Application\Service\AseguradoraService;
use Modules\Aseguradora\Infrastructure\Out\Persistence\Repository\AseguradoraRepository;

class Services extends BaseService
{

    public static function aseguradoraService()
    {
        if (static::hasInstance('aseguradoraService')) {
            return static::getSharedInstance('aseguradoraService');
        }

        $aseguradoraRepository = new AseguradoraRepository();

        return new AseguradoraService($aseguradoraRepository);
    }

}