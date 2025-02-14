<?php

namespace App\Models;

use CodeIgniter\Model;

class MovimientosUsuarioModel extends Model
{
    protected $table = 'movimientos';
    protected $primaryKey = 'idmovimiento';
    protected $allowedFields = ['idmovimiento', 'modulo', 
                                'tipo', 'descripcion', 
                                'contenido', 'username', 'idusuario', 
                                'createdat'];
    //protected $returnType = 'array';
    protected $returnType = \App\Entities\MovimientosUsuario::class; // Configuración para entidades
}
