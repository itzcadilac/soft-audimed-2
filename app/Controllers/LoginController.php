<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Services\UserService;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use Exception;

class LoginController extends BaseController
{

    //protected $userService;
    protected $userService;

    public function __construct()
    {
        $this->userService = service('userService');
    }

    public $helpers = ['url', 'form']; // Cargamos los helpers necesarios

    public function loginForm()
    {
        return $this->render('Auth/login.twig', ['title' => 'Login', 'error' => session()->getFlashdata('error')]);
    }

    public function login()
    {
        $logger = Services::logger();

        //$logger->debug('1. Estoy dentro de la funcion Login en LoginController');

        try {
            $numero_documento = $this->request->getPost('username');
            $password = $this->request->getPost('password');
    
            if (!$numero_documento || !$password) {
                session()->setFlashdata('error', 'Todos los campos son obligatorios.');
                return redirect()->back();
            }

            
    
            // Intentar autenticar al usuario

            $result = $this->userService->getAuthenticateUser($numero_documento, $password);

            if ($result['success']) {
                return redirect()->to('/inicio');
            } else {
                return redirect()->back()->with('error', 'Credenciales inválidas');
            }

        } catch (Exception $e) {

            $logger->error("Error Catch en LoginController----->" .$e->getMessage());

            session()->setFlashdata('error', 'Ocurrio un error');
            return redirect()->back();
        }

    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

}
