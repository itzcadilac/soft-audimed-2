<?php

namespace Modules\Notifications\Infrastructure\Out\Persistence\Repository;

use Modules\Notifications\Infrastructure\Out\Persistence\Model\TemplateModel;
use Config\Services;
use Exception;

class TemplateRepository {
    protected $templateModel;
    protected $logger;

    public function __construct()
    {
        $this->templateModel = new TemplateModel();
        $this->logger = Services::logger();
    }

    public function findByTemplateCode($codeTemplate){
        try{
            // Realizamos la query
            $result = $this->templateModel->where('codeplantilla', $codeTemplate)->first();
            // Si no se pudo obtener el registro devolvemos un error
            if (!$result) {
                return errorResponse("La plantilla con el codigo<{$codeTemplate}>, no ha sido encontrada.");
            }
            // Si se logro obtener el registro lo devolvemos en la respuesta
            return successResponse($result);
        }catch(Exception $e){
            $this->logger->error("TemplateRepository -> findByCodeTemplate: {$e->getMessage()}");
            return errorResponse();
        }
    }
}