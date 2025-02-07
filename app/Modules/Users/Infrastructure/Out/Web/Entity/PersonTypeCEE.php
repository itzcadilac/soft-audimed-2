<?php

namespace Modules\Users\Infrastructure\Out\Web\Entity;

use CodeIgniter\Entity\Entity;

class PersonTypeCEE extends Entity
{
    protected $attributes = [
        'numero'             => null,
        'nombres'            => null,
        'apellido_paterno'   => null,
        'apellido_materno'   => null
    ];

    protected $datamap = [
        'apellidopaterno' => 'apellido_paterno',
        'apellidomaterno' => 'apellido_materno'
    ];
}
