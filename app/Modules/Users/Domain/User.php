<?php

namespace Modules\Users\Domain;

use CodeIgniter\Entity\Entity;

class User extends Entity {
    protected $attributes = [
        'idusuario' => null,
        'idtipodocumento' => null,
        'numero_documento' => null,
        'avatar' => null,
        'apellidos' => null,
        'nombres' => null,
        'usuario' => null,
        'passwd' => null,
        'idperfil' => null,
        'activo' => '1',
        'eliminado' => 0,
        'estadoreg' => 0,
        'email' => null,
        'movil' => null,
        'idle_sesion' => 0,
        'fcreated' => null,
        'fupdated' => null,
        'fconfirm' => null,
        'flastpwd' => null,
        'flastmov' => null,
        'flastaccess' => null,
        'confirmado' => 0
    ];

    public function getFullName(){
        return $this->attributes["nombres"] . " " . $this->attributes["apellidos"];
    }
}
