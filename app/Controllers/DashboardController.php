<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class DashboardController extends BaseController
{
    public function index()
    {
        $logger = Services::logger();

        $data['menuItems'] = [
            ['label' => 'Inicio', 'url' => '/'],
            ['label' => 'Perfil', 'url' => '/perfil'],
            ['label' => 'Configuración', 'url' => '/configuracion'],
        ];

        //$data['domainsite'] = getenv('app.baseURL');

        $session = session();

        $username = $session->get('nombres');
        $data['usuario_session'] = $username;

        //var_dump($username);

        //$logger->error("Usuario en sesion: " . $username);

        return $this->render('Features/dashboard.twig', ['title' => 'Dashboard', 'data' => $data]);
    }
}
