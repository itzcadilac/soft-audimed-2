<?php

namespace Modules\Audit\Infrastructure\Out\Persistence\Model;

use CodeIgniter\Model;

class AuditModel extends Model
{
    protected $table = 'auditoria';
    protected $primaryKey = 'idauditoria';
    protected $allowedFields = [
        "idauditoria",
        "tipo",
        "username",
        "idusuario",
        "remotehost",
        "remotemachine",
        "descripcion",
        "contenido",
        "lat",
        "lon",
        "createdat"
    ];
    protected $returnType = \Modules\Audit\Domain\Audit::class;
}
