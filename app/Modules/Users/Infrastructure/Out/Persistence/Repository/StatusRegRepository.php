<?php

namespace Modules\Users\Infrastructure\Out\Persistence\Repository;

use Modules\Users\Infrastructure\Out\Persistence\Model\StatusRegModel;
use Config\Services;
use Exception;

class StatusRegRepository
{
    protected $statusregModel;
    protected $logger;

    public function __construct()
    {
        $this->statusregModel = new StatusRegModel();
        $this->logger = Services::logger();
    }

    public function getListEstadoReg()
    {
        try {
            $result = $this->statusregModel->where('tipo', ESTADO_REG)->findAll();

            if ($result) {
                return successResponse($result, 'Parámetros encontrados.');
            }
            return errorResponse('No hay Parámetros registrados.');
        } catch (Exception $e) {
            $this->logger->error("Error Catch en StatusRegRepository -> getListEstadoReg -> " + $e->getMessage());
            return errorResponse('Parámetros no encontrados.');
        }
    }
}
