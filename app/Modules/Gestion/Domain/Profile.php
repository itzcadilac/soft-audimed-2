<?php

namespace Modules\Gestion\Domain;

use CodeIgniter\Entity\Entity;

class Profile extends Entity
{
    protected $attributes = [
        'idperfil' => null,
        'perfil' => null,
        'activo' => '1',
        'eliminado' => 0,
        'estadoreg' => 0,
        'createdat' => null,
        'updatedat' => null,
        'createdby' => null,
        'updatedby' => null,
    ];
    
}
