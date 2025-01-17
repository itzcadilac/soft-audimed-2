<?php

namespace App\Services\Impl;

use App\Models\Repository\PerfilRepository;
use Config\Session;

class PerfilServiceImpl //implements UserService
{
    protected $perfilRepository;
    protected $session;
    //protected $logger;

    public function __construct(PerfilRepository $perfilRepository,Session $session)
    {
        $this->perfilRepository = $perfilRepository;
        $this->session = $session;
    }

    public function getModulosxPerfil($idPerfil){
        
    }

}