<?php

namespace App\Services\Impl;

use App\Models\Repository\ModuloPerfilRepository;
use Config\Services;
use CodeIgniter\Session\Session;
use Exception;

class ModuloxPerfilServiceImpl //implements UserService
{
    protected $moduloPerfilRepository;
    protected $session;
    //protected $logger;

    public function __construct(ModuloPerfilRepository $moduloPerfilRepository,Session $session)
    {
        $this->moduloPerfilRepository = $moduloPerfilRepository;
        $this->session = $session;
    }

    public function getModulosxPerfil($idPerfil){
        
        $logger = Services::logger();

        try {
            $result = $this->moduloPerfilRepository->getModulosxPerfil($idPerfil);
            return $result;
        } catch (Exception $e) {
            $logger->error("Error Catch en ModuloxPerfilServiceImpl -> getModulosxPerfil -> "+$e->getMessage());
            return errorResponse('No existen datos.');
        }
        
    }

}