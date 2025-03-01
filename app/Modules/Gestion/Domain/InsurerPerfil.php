<?php

namespace Modules\Gestion\Domain;

use CodeIgniter\Entity\Entity;

class InsurerPerfil extends Entity
{
    protected $attributes = [
        'idperfilaseguradora',
        'idaseguradora',
        'idperfil',
        'productos',
        'eliminado',
        'estadoreg',
        'createdat',
        'updatedat',
        'createdby',
        'updatedby'
    ];
    
}
