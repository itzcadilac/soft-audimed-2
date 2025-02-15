<?php

namespace Modules\Users\Domain;

use CodeIgniter\Entity\Entity;

class Parameters extends Entity
{
    protected $attributes = [
        'idparametro' => null,
        'tipo' => null,
        'codigo' => null,
        'valor' => null,
        'activo' => null,
        'eliminado' => null,
        'estadoreg' => null,
        'createdat' => null,
        'updatedat' => null,
        'createdby' => null,
        'updatedby' => null
    ];

    protected $datamap = [
        'descripcion' => 'codigo',
        'id' => 'valor'
    ];
}
