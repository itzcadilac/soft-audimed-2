<?php
namespace Modules\Siniestro\Config;

use CodeIgniter\Config\BaseService;
use Modules\Siniestro\Application\Service\AseguradoraService;
use Modules\Siniestro\Application\Service\SiniestroService;
use Modules\Siniestro\Infrastructure\Out\Persistence\Repository\AseguradoraRepository;
use Modules\Siniestro\Infrastructure\Out\Persistence\Repository\SiniestroRepository;

class Services extends BaseService
{
    public static function SiniestroService()
    {
        if (static::hasInstance('SiniestroService')) {
            return static::getSharedInstance('SiniestroService');
        }

        $SiniestroRepository = new SiniestroRepository();

        return new SiniestroService($SiniestroRepository);
    }

    public static function AseguradoraService($getShared = true)
    {
        if (static::hasInstance('AseguradoraService')) {
            return static::getSharedInstance('AseguradoraService');
        }

        $aseguradoraRepository = new AseguradoraRepository();

        return new AseguradoraService($aseguradoraRepository);
    }

}