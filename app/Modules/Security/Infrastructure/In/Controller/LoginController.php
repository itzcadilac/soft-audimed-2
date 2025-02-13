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
                return redirect()->back()->with('error', $result['message']);
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

    public function recoverPassword()
    {
        return $this->render('Auth/recoverPassword.twig', ['title' => 'recoverPassword', 'error' => session()->getFlashdata('error')]);
    }

    public function recoverPasswordAction(){

        $logger = Services::logger();

        try {
            $data = $this->request->getJSON(true);

            // Validar si los datos existen
            if (!isset($data['identity_number'])) {
                return $this->respond(['success' => false, 'message' => 'Falta numero documento'], 400);
            }

            if (!isset($data['email'])) {
                return $this->respond(['success' => false, 'message' => 'Falta correo electronico'], 400);
            }

            $num_doc = $data['identity_number'];
            $email = $data['email'];

            $logger->info("Recibiendo Numero de documento: " . $num_doc);

            return $this->respond([
                'success' => true,
                'message' => 'Solicitud procesada correctamente'
            ], 200);

        } catch (\Throwable $e) {
            $logger->error("Error en recoverPassword: " . $e->getMessage());
            return $this->respond(['success' => false, 'message' => 'Error en el servidor'], 500);
        }

    }
}
