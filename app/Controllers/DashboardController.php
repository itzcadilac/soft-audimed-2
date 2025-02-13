<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Config\Services as ConfigServices;
use CodeIgniter\HTTP\ResponseInterface;
use Modules\Siniestro\Config\Services as AseguradoraService;
use Config\Services;

class DashboardController extends BaseController
{
    protected $AseguradoraService;

    public function __construct()
    {
        $this->AseguradoraService = AseguradoraService::AseguradoraService();
    }

    public function index()
    {
        $logger = Services::logger();
        $this->session = ConfigServices::session();

        /*
        $data['menuItems'] = [
            ['label' => 'Inicio', 'url' => '/'],
            ['label' => 'Perfil', 'url' => '/perfil'],
            ['label' => 'Configuración', 'url' => '/configuracion'],
        ];
        */

        //$data['domainsite'] = getenv('app.baseURL');

        /*
        $session = session();

        $username = $session->get('nombres');
        $data['usuario_session'] = $username;
        */

        $data['prod_aseg'] = [];
        $session = session();
        $array_aseg_user = $session->get('aseguradoras_user');
        $idaseguradora_user = $session->get('idaseguradora_user');
        $idproducto_user = $session->get('idproducto_user');

        if($idaseguradora_user > 0){
            $idUser = $session->get('idusuario');
            $idPerfil = $session->get('idperfil');
            $idAseguradora = $session->get('idaseguradora_user');

            $result = $this->AseguradoraService->getProductsxAseg($idaseguradora_user,$idUser,$idPerfil);
            $array_prod_aseg = $result["data"];
            $data['prod_aseg'] = $array_prod_aseg;
        }

        $data['aseg_usuario'] = $array_aseg_user;
        $data['idaseguradora_user'] = $idaseguradora_user;
        $data['idproducto_user'] = $idproducto_user;

        /*
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        exit();
        */

        //var_dump($username);

        //$logger->error("Usuario en sesion: " . $username);

        //return $this->render('Features/dashboard.twig', ['title' => 'Dashboard', 'data' => $data]);
        return $this->render('Features/dashboard.twig', ['title' => 'Dashboard', 'data' => $data]);
    }
}
