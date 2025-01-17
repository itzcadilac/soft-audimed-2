<?php

namespace App\Models\Repository;

use App\Models\ModuloModel;
use Exception;

class ModulosRepository
{
    protected $moduloModel;

    public function __construct()
    {
        $this->moduloModel = new ModuloModel();
    }

}


