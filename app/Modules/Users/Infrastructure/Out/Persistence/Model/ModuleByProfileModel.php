<?php

namespace Modules\Users\Infrastructure\Out\Persistence\Model;

use CodeIgniter\Model;

class ModuleByProfileModel extends Model{
    protected $table = 'modulo_perfil';
    protected $primaryKey = 'idmoduloperfil';
    protected $allowedFields = ['idmoduloperfil', 'idmodulo', 'idperfil', 'activo'];
    protected $returnType = \Modules\Users\Domain\ModuleByProfile::class;
}