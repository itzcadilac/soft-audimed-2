<?php

namespace Modules\Aseguradora\Application\Service;

use Config\Services;
use Exception;
use Modules\Aseguradora\Infrastructure\Out\Persistence\Repository\AseguradoraRepository;

class AseguradoraService
{
    protected $aseguradoraRepository;

    public function __construct(AseguradoraRepository $aseguradoraRepository)
    {
        $this->aseguradoraRepository = $aseguradoraRepository;
    }

    public function getAseguradoraxUser($idUser)
    {
        $logger = Services::logger();

        try {
            $result = $this->aseguradoraRepository->getAseguradoraxUser($idUser);
            //$logger->info("Datos en ServiceImpl: " . json_encode($result));
            return $result;
        } catch (Exception $e) {
            $logger->error("Error Catch en AseguradoraServiceImpl: getAseguradoraxUser: "+$e->getMessage());
            return errorResponse('Ocurrio un error al traer los datos');
        }

    }

    public function getProductsxAseg($idAseg)
    {
        $logger = Services::logger();

        try {
            $result = $this->aseguradoraRepository->getProductsxAseg($idAseg);
            //$logger->info("Datos en ServiceImpl: " . json_encode($result));
            return $result;
        } catch (Exception $e) {
            $logger->error("Error Catch en AseguradoraServiceImpl: getProductsxAseg: "+$e->getMessage());
            return errorResponse('Ocurrio un error al traer los datos');
        }

    }
}