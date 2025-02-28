<?php

namespace Modules\Gestion\Domain;

use CodeIgniter\Entity\Entity;

class InsurerUser extends Entity
{
    protected $attributes = [
        'idusuarioaseguradora',
        'idaseguradora',
        'idusuario',
        'productos',
        'activo',
        'eliminado',
        'estadoreg',
        'createdat',
        'updatedat',
        'createdby',
        'updatedby'
    ];
    
}
