<?php

namespace Modules\Users\Domain;

use CodeIgniter\Entity\Entity;

class DocumentType extends Entity
{
    protected $attributes = [
        'idtipodocumento' => null,
        'codigo_curl' => null,
        'codigo_sunat' => null,
        'tipo_documento' => null,
        'longitud' => null,
        'activo' => null
    ];

    protected $datamap = [
        'id' => 'idtipodocumento',
        'name' => 'tipo_documento',
        'size' => 'longitud',
        'isActive' => 'activo'
    ];
}
