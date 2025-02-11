<?php

namespace Modules\Users\Infrastructure\Out\Persistence\Model;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'idusuario';
    protected $allowedFields = [
        'idusuario',
        'idtipodocumento',
        'numero_documento',
        'avatar',
        'apellidos',
        'nombres',
        'usuario',
        'passwd',
        'idperfil',
        'activo',
        'retry',
        'fretry',
        'eliminado',
        'estadoreg',
        'email',
        'movil',
        'idle_sesion',
        'fconfirm',
        'flastpwd',
        'flastmov',
        'flastaccess',
        'confirmado',
        'createdat',
        'updatedat',
        'createdby',
        'updatedby',
        'retry',
        'fretry'
    ];
    protected $returnType = \Modules\Users\Domain\User::class;
}
