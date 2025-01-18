<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'idusuario';
    protected $allowedFields = ['idusuario', 'idtipodocumento', 
                                'numero_documento', 'avatar', 
                                'apellidos', 'nombres', 'usuario', 
                                'passwd', 'idperfil', 'activo'];
    //protected $returnType = 'array';
    protected $returnType = \App\Entities\Usuario::class; // Configuración para entidades
}
