<?php

namespace App\Models;

use CodeIgniter\Model;

class ModuloPerfilModel extends Model
{
    protected $table = 'modulo_perfil';
    protected $primaryKey = 'idModulo';
    protected $allowedFields = ['idmodulo', 'descripcion', 'menu', 'icono', 'url', 'imagen', 'mini', 'orden'];
}
