<?php

namespace Modules\Users\Infrastructure\Out\Persistence\Model;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table = 'perfil';
    protected $primaryKey = 'idperfil';
    protected $allowedFields = [
        'idperfil',
        'perfil',
        'activo',
        'eliminado',
        'estadoreg',
        'createdat',
        'updatedat',
        'createdby',
        'updatedby',
    ];
    protected $returnType = \Modules\Users\Domain\Profile::class;
}
