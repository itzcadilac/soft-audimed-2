<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SiniestroController extends BaseController
{
    public function pacientes()
    {
        return $this->render('Features/siniestro.twig', ['title' => 'Siniestro']);
    }

    public function medicos()
    {
        return $this->render('Features/medicos.twig', ['title' => 'Medicos']);
    }

}
