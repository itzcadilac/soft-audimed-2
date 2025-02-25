<?php

namespace Modules\Users\Infrastructure\Out\Web\Entity;

use CodeIgniter\Entity\Entity;

class PersonTypeDNI extends Entity
{
    protected $attributes = [
        'numero'             => null,
        'nombres'            => null,
        'apellido_paterno'   => null,
        'apellido_materno'   => null,
        'nombre_completo'    => null,
        'departamento'       => null,
        'provincia'          => null,
        'distrito'           => null,
        'direccion'          => null,
        'direccion_completa' => null,
        'ubigeo_reniec'      => null,
        'ubigeo_sunat'       => null,
        'ubigeo'             => [],
        'fecha_nacimiento'   => null,
        'estado_civil'       => null,
        'foto'               => null,
        'sexo'               => null,
    ];

    protected $datamap = [
        'apellidopaterno' => 'apellido_paterno',
        'apellidomaterno' => 'apellido_materno',
        'nombrecompleto' => 'nombre_completo',
        'direccioncompleta' => 'direccion_completa',
        'ubigeoreniec' => 'ubigeo_reniec',
        'ubigeosunat' => 'ubigeo_sunat',
        'fechanacimiento' => 'fecha_nacimiento',
        'estadocivil' => 'estado_civil'
    ];
}
