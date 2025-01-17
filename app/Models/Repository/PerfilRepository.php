<?php

namespace App\Models\Repository;

use App\Models\PerfilModel;
use Exception;

class PerfilRepository
{
    protected $perfilModel;

    public function __construct()
    {
        $this->perfilModel = new PerfilModel();
    }




}