<?php

namespace Modules\Notifications\Infrastructure\Out\Persistence\Model;

use CodeIgniter\Model;

class NotificationModel extends Model
{
    protected $table = 'notificaciones';
    protected $primaryKey = 'idnotificacion';
    protected $allowedFields = [
        "idnotificacion",
        "codeplantilla",
        "tipo",
        "fecha",
        "fexpiracion",
        "fenvio",
        "usuario",
        "email",
        "cc",
        "bcc",
        "token_fcm",
        "topic_fcm",
        "subject",
        "contenido",
        "uuid",
        "enviado",
        "reintentos",
        "activo",
        "eliminado",
        "estadoreg",
        "createdat",
        "updatedat",
        "createdby",
        "updatedby",
    ];
    protected $returnType = \Modules\Notifications\Domain\Notification::class;
}
