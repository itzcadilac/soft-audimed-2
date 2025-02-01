<?php

namespace Modules\Users\Infrastructure\Out\Persistence\Model;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table = 'perfil';
    protected $primaryKey = 'idperfil';
    protected $allowedFields = ['idperfil', 'perfil', 'activo'];
    protected $returnType = \Modules\Users\Domain\Profile::class;
}
