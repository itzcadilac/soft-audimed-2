<?php

namespace Modules\Notifications\Domain;

use CodeIgniter\Entity\Entity;

class Template extends Entity {
    protected $attributes = [
        "idplantilla" => null,
        "codeplantilla" => null,
        "tipo" => null,
        "descripcion" => null,
        "dias_expira" => null,
        "cc" => null,
        "bcc" => null,
        "topic_fcm" => null,
        "subject" => null,
        "contenido" => null,
        "activo" => null,
        "eliminado" => null,
        "estadoreg" => null,
        "fcreated" => null,
        "fupdated" => null
    ];
}