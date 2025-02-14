<?php

namespace Modules\Users\Domain;

use CodeIgniter\Entity\Entity;

class AuditUser extends Entity
{
    protected $attributes = [
        'idmovimiento' => null,
        'modulo' => null,
        'tipo' => null,
        'descripcion' => null,
        'contenido' => null,
        'username' => null,
        'idusuario' => null,
        'createdat' => null,
    ];

    protected $casts = [
        'movimientosusuario' => 'object'
    ];

}
