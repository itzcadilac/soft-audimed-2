<?php

namespace App\Models\Repository;

use App\Models\SiniestroModel;
use Config\Services;
use Exception;


class SiniestroRepository
{
    protected $siniestroModel;

    public function __construct()
    {
        $this->siniestroModel = new SiniestroModel();
    }

    public function getAllActiveSinistro()
    {
        $logger = Services::logger();

        try {

            //$logger->info("Ingresa a UserRepository: getAllActiveUsers: ");
            
            $result = $this->siniestroModel->select('siniestroId,
                                                    numeroPoliza,
                                                    numeroPlaca,
                                                    fechaSiniestro,
                                                    fechaComunicacion,
                                                    activacionServicioMedico,
                                                    nombreAsegurado')
                                         ->where('activo', 1)
                                         ->findAll();

            //$logger->info("Trae los datos: " . json_encode($result));

            if ($result) {
                //$logger->info("Ingresa en result: " . json_encode($result));
                return successResponse($result, 'Datos encontrados.');
            }else{
                //$logger->info("Ingresa a datos no encontrado: " . json_encode($result));
                return errorResponse('No existen datos');
            }

        } catch (Exception $e) {
            $logger->error("Error Catch en SiniestroRepository: getAllActiveSinistro: "+$e->getMessage());
            return errorResponse('Ocurrio un error al traer los datos');
        }

    }

}