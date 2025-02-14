<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class MovimientosUsuario extends Entity
{
    protected $attributes = [
        'idmovimiento' => null,
        'modulo' => null,
        'tipo' => null,
        'descripcion' => null,
        'contenido' => null,
        'username' => null,
        'idusuario' => null,
        'createdat' => null
    ];

}
