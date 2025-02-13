<?php
namespace Modules\Siniestro\Application\Service;

use Config\Services;
use Exception;
use Modules\Siniestro\Infrastructure\Out\Persistence\Repository\AseguradoraRepository;

class AseguradoraService
{
    protected $aseguradoraRepository;

    public function __construct(AseguradoraRepository $aseguradoraRepository)
    {
        $this->aseguradoraRepository = $aseguradoraRepository;
    }

    public function findById($id)
    {
        return $this->aseguradoraRepository->findById($id);
    }

    public function getAseguradoraxUser($idUser,$idPerfil)
    {
        $logger = Services::logger();

        try {
            $result = $this->aseguradoraRepository->getAseguradoraxUser($idUser,$idPerfil);
            //$logger->info("Datos en ServiceImpl: " . json_encode($result));

            if (!$result) {
                return errorResponse('No existen datos');
            }

            return successResponse($result,'ok');
        } catch (\Throwable $e) {
            $logger->error("Error Catch en AseguradoraService: getAseguradoraxUser: ".$e->getMessage());
            return errorResponse('Ocurrio un error al traer los datos');
        }

    }

    public function getProductsxAseg($idAseg,$idUser,$idPerfil)
    {
        $logger = Services::logger();

        try {
            $result = $this->aseguradoraRepository->getProductsxAseg($idAseg,$idUser,$idPerfil);
            //$logger->info("Datos en ServiceImpl: " . json_encode($result));
            if (!$result) {
                return errorResponse('No existen datos');
            }

            $result_r = [];

            // Recorrer los resultados
            /*
            foreach ($result as $fila) {
                $items = explode(',', $fila['productos']);
                
                $result_r = array_unique(array_merge($result_r, $items));
            }
            */

            

            /*
            header('Content-Type: application/json');
            echo json_encode(successResponse($result_r, 'ok'), JSON_PRETTY_PRINT);
            exit;
            */

            return successResponse($result,'ok');
        } catch (\Throwable $e) {
            $logger->error("Error Catch en AseguradoraService: getProductsxAseg: ".$e->getMessage());
            return errorResponse('Ocurrio un error al traer los datos');
        }

    }

}