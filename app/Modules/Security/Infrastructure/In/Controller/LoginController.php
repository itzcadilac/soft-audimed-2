<?php

namespace Modules\Security\Infrastructure\In\Controller;

use App\Controllers\BaseController;
use Config\Services;
use Exception;

use Modules\Security\Config\Services as SecurityServices;

class LoginController extends BaseController
{
    protected $loginService;

    public function __construct()
    {
        $this->loginService = SecurityServices::loginService();
    }

    public function loginForm()
    {
        return $this->render('Auth/login.twig', ['title' => 'Login', 'error' => session()->getFlashdata('error')]);
    }

    public function loginAction()
    {
        $logger = Services::logger();

        try {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $ipAddress = $this->request->getIPAddress();
            $hostname = gethostbyaddr($ipAddress);

            if (!$username || !$password) {
                session()->setFlashdata('error', 'Todos los campos son obligatorios.');
                return redirect()->back();
            }

            $result = $this->loginService->loginUser($username, $password, $ipAddress, $hostname);

            if ($result['success']) {
                return redirect()->to('/inicio');
            } else {
                return redirect()->back()->with('error', 'Credenciales inválidas');
            }
        } catch (Exception $e) {

            $logger->error("Error Catch en LoginController----->" . $e->getMessage());

            session()->setFlashdata('error', 'Ocurrio un error');
            return redirect()->back();
        }
    }

    public function logoutAction()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
