<?php

namespace Modules\Notifications\Domain;

use CodeIgniter\Entity\Entity;

class Notification extends Entity {
    protected $attributes = [
        "idnotificacion" => null,
        "codeplantilla" => null,
        "tipo" => null,
        "fecha" => null,
        "fexpiracion" => null,
        "fenvio" => null,
        "usuario" => null,
        "email" => null,
        "cc" => null,
        "bcc" => null,
        "token_fcm" => null,
        "topic_fcm" => null,
        "subject" => null,
        "contenido" => null,
        "uuid" => null,
        "enviado" => 0,
        "reintentos" => 0,
        "activo" => 1,
        "eliminado" => 0,
        "estadoreg" => 0,
        "createdat" => null,
        "updatedat" => null,
        "createdby" => null,
        "updatedby" => null,
    ];

    protected $datamap = [
        "tokenfcm" => "token_fcm",
        "topicfcm" => "topic_fcm",
    ];
}