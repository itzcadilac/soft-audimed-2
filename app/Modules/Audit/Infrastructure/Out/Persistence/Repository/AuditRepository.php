<?php

namespace Modules\Audit\Infrastructure\Out\Persistence\Repository;

use Config\Services;
use Modules\Audit\Infrastructure\Out\Persistence\Model\AuditModel;
use Exception;
use Modules\Audit\Domain\Audit;

class AuditRepository
{
    protected $auditModel;
    protected $logger;

    public function __construct()
    {
        $this->auditModel = new AuditModel();
        $this->logger = Services::logger();
    }

    public function save(Audit $audit)
    {
        try {
            $this->logger->info("Vamos a registrar un evento de auditoria para {$audit->username}");
            // Actualizamos le campo fecha de creacion
            $audit->createdat = date("Y-m-d H:i:s");
            // Realizamos la query
            $result = $this->auditModel->save($audit);
            if (!$result) {
                return errorResponse("No se pudo guardar el registro en: auditoria");
            }
            $this->logger->info("Los datos e auditoria se guardaron correctamente");
            // Devolvemos el registro creado en la respuesta
            return successResponse("La auditoria se guardo correctamente");
        } catch (Exception $e) {
            $this->logger->error("AuditRepository -> save: {$e->getMessage()}");
            return errorResponse();
        }
    }
}
