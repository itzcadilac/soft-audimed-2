<?php

namespace Modules\Audit\Infrastructure\Events;

use Modules\Audit\Infrastructure\Out\Persistence\Repository\AuditRepository;
use Modules\Audit\Application\Service\AuditService;

class SaveAuditEventListener
{
    public function handle($audit)
    {
        $session = service('session');
        $auditRepository = new AuditRepository();
        $auditService = new AuditService($auditRepository, $session);
        $auditService->save($audit);
    }
}
