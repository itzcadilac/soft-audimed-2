<?php

namespace Modules\Common\Audit\Entity;

use CodeIgniter\Entity\Entity;

class Audit extends Entity
{
    protected $attributes = [
        "idauditoria" => null,
        "tipo" => null,
        "username" => null,
        "idusuario" => null,
        "remotehost" => "0.0.0.0",
        "remotemachine" => null,
        "descripcion" => null,
        "contenido" => null,
        "lat" => null,
        "lon" => null,
        "createdat" => null
    ];
}
