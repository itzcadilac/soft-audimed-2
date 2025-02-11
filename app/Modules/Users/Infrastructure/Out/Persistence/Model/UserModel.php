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
        'eliminado',
        'estadoreg',
        'email',
        'movil',
        'idle_sesion',
        'fcreated',
        'fupdated',
        'fconfirm',
        'flastpwd',
        'flastmov',
        'flastaccess',
        'confirmado'
    ];
    protected $returnType = \Modules\Users\Domain\User::class;
}
