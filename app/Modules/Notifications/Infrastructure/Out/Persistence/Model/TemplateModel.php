<?php

namespace Modules\Notifications\Infrastructure\Out\Persistence\Model;

use CodeIgniter\Model;

class TemplateModel extends Model
{
    protected $table = 'plantillas';
    protected $primaryKey = 'idplantilla';
    protected $allowedFields = [
        "idplantilla",
        "codeplantilla",
        "tipo",
        "descripcion",
        "dias_expira",
        "cc",
        "bcc",
        "topic_fcm",
        "subject",
        "contenido",
        "activo",
        "eliminado",
        "estadoreg",
        "fcreated",
        "fupdated"
    ];
    protected $returnType = \Modules\Notifications\Domain\Template::class;
}
