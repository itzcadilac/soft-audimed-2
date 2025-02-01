<?php

namespace Modules\Users\Domain;

use CodeIgniter\Entity\Entity;

class Profile extends Entity
{
    protected $attributes = [
        'idperfil' => null,
        'perfil' => null,
        'activo' => null,
    ];

    protected $datamap = [
        'id' => 'idperfil',
        'name' => 'perfil',
        'isActive' => 'activo'
    ];
}
