<?php

namespace Modules\Users\Domain;

use CodeIgniter\Entity\Entity;

class Person extends Entity
{
    protected $attributes = [
        "idepersona" => null,
        "tipdocumento" => null,
        "documento" => null,
        "nombres" => null,
        "ape_paterno" => null,
        "ape_materno" => null,
        "estado" => 1,
        "fecregistro" => null
    ];

    protected $datamap = [
        "apepaterno" => "ape_paterno",
        "apematerno" => "ape_materno"
    ];
}
