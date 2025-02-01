<?php

namespace Modules\Users\Application\Service;

use Modules\Users\Infrastructure\Out\Persistence\Repository\ModuleByProfileRepository;
use Config\Services;
use Exception;

class ModuleByProfileService
{
    protected $moduleByProfileRepository;
    protected $session;

    public function __construct(ModuleByProfileRepository $moduleByProfileRepository)
    {
        $this->moduleByProfileRepository = $moduleByProfileRepository;
    }

    public function getListModuleByProfile($profileId)
    {
        $logger = Services::logger();

        try {
            $result = $this->moduleByProfileRepository->findModulesByProfile($profileId);
            return $result;
        } catch (Exception $e) {
            $logger->error("Error Catch en ModuloxPerfilServiceImpl -> getModulosxPerfil -> " + $e->getMessage());
            return errorResponse('No existen datos.');
        }
    }
}
