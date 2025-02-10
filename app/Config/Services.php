<?php

namespace Config;

use App\Models\Repository\ModuloPerfilRepository;
use App\Models\Repository\PerfilRepository;
use App\Models\Repository\SiniestroRepository;
use App\Services\Impl\ModuloxPerfilServiceImpl;
use App\Services\Impl\PerfilServiceImpl;
use App\Services\Impl\SiniestroServiceImpl;
use CodeIgniter\Config\BaseService;

/**
 * Services Configuration file.
 *
 * Services are simply other classes/libraries that the system uses
 * to do its job. This is used by CodeIgniter to allow the core of the
 * framework to be swapped out easily without affecting the usage within
 * the rest of your application.
 *
 * This file holds any application-specific services, or service overrides
 * that you might need. An example has been included with the general
 * method format you should use for your service methods. For more examples,
 * see the core Services file at system/Config/Services.php.
 */
class Services extends BaseService
{
    public static function perfilService($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('perfilService');
        }

        $perfilRepository = new PerfilRepository();
        $session = service('session');

        return new PerfilServiceImpl($perfilRepository, $session);
    }

    public static function moduloPerfilService($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('moduloPerfilService');
        }

        $moduloPerfilRepository = new ModuloPerfilRepository();
        $session = service('session');

        return new ModuloxPerfilServiceImpl($moduloPerfilRepository, $session);
    }

    public static function siniestroService($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('siniestroService');
        }

        $siniestroRepository = new SiniestroRepository();
        $session = service('session');

        return new SiniestroServiceImpl($siniestroRepository, $session);
    }
}
