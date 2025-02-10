<?php

namespace Modules\Users\Application\Service;

use Modules\Users\Infrastructure\Out\Persistence\Repository\DocumentTypeRepository;
use Config\Services;
use Exception;

class DocumentTypeService {
    protected $documentTypeRepository;

    public function __construct(DocumentTypeRepository $documentTypeRepository)
    {
        $this->documentTypeRepository = $documentTypeRepository;
    }

    public function getDocumentTypeList(){
        $logger = Services::logger();

        try {
            return $this->documentTypeRepository->findAll(ACTIVE_VALUE);
        } catch (Exception $e) {
            $logger->error("Error Catch en DocumentTypeService -> getDocumentTypeList -> " + $e->getMessage());
            return errorResponse('No existen datos.');
        }
    }
}