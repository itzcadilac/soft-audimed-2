<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use Exception;

class SiniestroController extends BaseController
{

    protected $siniestroService;

    public function __construct()
    {
        $this->siniestroService = service('siniestroService');
    }

    public function pacientes()
    {

        $data['siniestro'] = $this->siniestroService->getAllActiveSinistro();

        return $this->render('Features/siniestro.twig', ['title' => 'Siniestro', 'data' => $data]);
    }

    public function nuevoSiniestro()
    {
        return $this->render('Features/nuevoSiniestro.twig', ['title' => 'Medicos']);
    }

    public function getAllActiveSinistro(){

        $logger = Services::logger();
        try {

            $result = $this->siniestroService->getAllActiveSinistro();
            
            if($result["success"]){
                return $this->respond($result, 200);
            }else{
                return $this->respond($result, 400); //No existen datos
            }

        } catch (Exception $e) {

            $logger->error("Error Catch en SiniestroController: getAllActiveSinistro: "+$e->getMessage());

            $result = [
                'status' => 'error',
                'message' => 'Hubo un error',
            ];

            return $this->respond($result, 400); //error al llamar al EndPoint
        }

    }

}
