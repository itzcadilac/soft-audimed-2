<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class RRHHController extends BaseController
{
    public function index()
    {
        return $this->render('Features/rrhh.twig', ['title' => 'RRHH']);
    }

    public function saveEmployee()
    {
        return "Guardado";
        //return $this->render('Features/rrhh.twig', ['title' => 'RRHH']);
    }

}
