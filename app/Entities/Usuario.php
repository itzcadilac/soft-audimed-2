<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Usuario extends Entity
{
    protected $attributes = [
        'idusuario' => null,
        'idtipodocumento' => null,
        'numero_documento' => null,
        'avatar' => null,
        'apellidos' => null,
        'nombres' => null,
        'usuario' => null,
        'passwd' => null,
        'idperfil' => null,
        'activo' => null,
    ];

}
