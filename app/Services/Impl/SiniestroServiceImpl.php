<?php

namespace App\Services\Impl;

use App\Models\Repository\SiniestroRepository;
use CodeIgniter\Session\Session;
use Config\Services;
use Exception;

class SiniestroServiceImpl //implements UserService
{
    protected $siniestroRepository;
    protected $session;

    public function __construct(SiniestroRepository $siniestroRepository,Session $session)
    {
        // Cargar la capa de acceso a datos
        $this->siniestroRepository = $siniestroRepository;
        $this->session = $session;
        //$this->logger = getLogger();
    }

    public function getAllActiveSinistro()
    {
        $logger = Services::logger();

        try {
            
            $result = $this->siniestroRepository->getAllActiveSinistro();
            //$logger->info("Datos en ServiceImpl: " . json_encode($result));
            return $result;
        } catch (Exception $e) {
            $logger->error("Error Catch en SiniestroServiceImpl: getAllActiveSinistro: "+$e->getMessage());
            return errorResponse('Ocurrio un error al traer los datos');
        }

    }

}