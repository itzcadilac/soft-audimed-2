<?php

namespace Modules\Users\Application\Service;

use Modules\Users\Infrastructure\Out\Persistence\Repository\StatusRegRepository;
use Config\Services;
use Exception;

class ParametersService {
    protected $statusRegRepository;

    public function __construct(StatusRegRepository $statusRegRepository)
    {
        $this->statusRegRepository = $statusRegRepository;
    }

    public function getListEstadoReg(){
        $logger = Services::logger();

        try {
            return $this->statusRegRepository->getListEstadoReg();
        } catch (Exception $e) {
            $logger->error("Error Catch en StatusRegRepository -> getListEstadoReg -> " + $e->getMessage());
            return errorResponse('No existen datos.');
        }
    }
}