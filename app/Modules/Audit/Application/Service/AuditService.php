<?php

namespace Modules\Audit\Application\Service;

use Config\Services;
use CodeIgniter\Session\Session;
use Exception;
use Modules\Audit\Domain\Audit;
use Modules\Audit\Infrastructure\Out\Persistence\Repository\AuditRepository;

class AuditService
{
    protected $auditRepository;
    protected $logger;
    protected $session;

    public function __construct(AuditRepository $auditRepository, Session $session)
    {
        $this->auditRepository = $auditRepository;
        $this->session = $session;
        $this->logger = Services::logger();
    }

    public function save($auditArray)
    {
        try {
            $this->logger->info("Iniciamos el proceso de guardar la auditoria");
            $audit = new Audit($auditArray);
            $audit->username = $this->session->get("usuario");
            $audit->idusuario = $this->session->get("idusuario");
            $this->auditRepository->save($audit);
            $this->logger->info("La auditoria se guardo correctamente");
        } catch (Exception $e) {
            return errorResponse();
        }
    }
}
