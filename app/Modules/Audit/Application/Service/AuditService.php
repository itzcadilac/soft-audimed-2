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
            $this->completeData($audit);
            $this->auditRepository->save($audit);
            $this->logger->info("La auditoria se guardo correctamente");
        } catch (Exception $e) {
            return errorResponse();
        }
    }

    private function completeData(Audit $audit)
    {
        if ($this->session->has("usuario")) {
            $audit->username = $this->session->get("usuario");
            $audit->idusuario = $this->session->get("idusuario");
            $audit->remotehost = $this->session->get("ipAddress") ?? '0.0.0.0';
            $audit->remotemachine = $this->session->get("hostname") ?? 'localhost';
        }
    }
}
