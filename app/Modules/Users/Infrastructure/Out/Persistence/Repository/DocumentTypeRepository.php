<?php

namespace Modules\Users\Infrastructure\Out\Persistence\Repository;

use Modules\Users\Infrastructure\Out\Persistence\Model\DocumentTypeModel;
use Config\Services;
use Exception;

class DocumentTypeRepository
{
    protected $documentTypeModel;

    public function __construct()
    {
        $this->documentTypeModel = new DocumentTypeModel();
    }

    public function findAll($status)
    {
        $logger = Services::logger();

        try {
            $result = $this->documentTypeModel->where('activo', $status)->findAll();

            if ($result) {
                return successResponse($result, 'Tipos de documento encontrados.');
            }

            return errorResponse('Tipos de documento no encontrado.');
        } catch (Exception $e) {
            $logger->error("Error Catch en DocumentTypeRepository----->" + $e->getMessage());
            return errorResponse('Tipos de documento no encontrado.');
        }
    }
}
