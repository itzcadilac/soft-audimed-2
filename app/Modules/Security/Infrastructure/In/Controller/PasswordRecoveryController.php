<?php

namespace Modules\Security\Infrastructure\In\Controller;

use App\Controllers\BaseController;
use Config\Services;
use Exception;

use Modules\Security\Config\Services as SecurityServices;
use Modules\Security\Config\Services as PasswordRecoveryService;

class PasswordRecoveryController extends BaseController
{
    protected $passwordRecoveryService;

    public function __construct()
    {
        $this->passwordRecoveryService = PasswordRecoveryService::passwordRecoveryService();
    }

    public function requestRecoveryView()
    {
        return $this->render('Auth/recoverPassword.twig', ['title' => 'recoverPassword', 'error' => session()->getFlashdata('error')]);
    }

    public function resetPasswordView()
    {
        $request = \Config\Services::request();
        //$token = $request->getGet('token'); // Obtener token desde la URL
        $token = $request->getGet('uuid');
    
        if (!$token) {
            /*
            return $this->render('Auth/resetPassword.twig', [
                'title' => 'resetPassword',
                'error' => 'Token inválido o expirado'
            ]);
            */
            return $this->render('security-module/view-user-confirm-invalid.twig');
            
        }
    
        // Validar si el token existe en la base de datos
        $db = \Config\Database::connect();
        $query = $db->query("SELECT usuario, email FROM notificaciones WHERE activo = 1 and fexpiracion > current_timestamp and uuid = ?", [$token]);
        $result = $query->getRow();
    
        if (!$result) {
            /*
            return $this->render('Auth/resetPassword.twig', [
                'title' => 'resetPassword',
                'error' => 'Token inválido o expirado'
            ]);
            */
            return $this->render('security-module/view-user-confirm-invalid.twig');
        }
    
        return $this->render('Auth/resetPassword.twig', [
            'title' => 'resetPassword',
            'error' => null,  // Sin error
            'token' => $token // Pasamos el token para su uso en el formulario
        ]);
    }

    public function requestRecovery()
    {

        if (!$this->validate([
            'email' => 'required|valid_email',
            'identity_number' => 'required'
        ])) {
            return $this->respond(errorResponse('Datos inválidos', $this->validator->getErrors()));
        }

        $data = $this->request->getJSON(true);

        $email = $data['email'];
        $identityNumber = $data['identity_number'];
        $userSelect = $data['userSelect'];

        $response = $this->passwordRecoveryService->findByEmailAndIdentity($email, $identityNumber, $userSelect);
        return $this->respond($response);
    }

    public function resetPassword()
    {
        $data = $this->request->getJSON(true);

        $token = $data['token'];
        $newPassword = $data['newPassword'];

        $response = $this->passwordRecoveryService->resetPassword($token, $newPassword);
        return $this->respond($response);
    }

    public function sendTestEmail()
    {
        $emailService = Services::email();

        $emailService->setTo('erickjpriju@gmail.com');
        $emailService->setSubject('Prueba de Envío de Correo');
        $emailService->setMessage('<p>Este es un correo de prueba enviado desde CodeIgniter 4.</p>');
        $emailService->setMailType('html');

        if ($emailService->send()) {
            return 'Correo enviado correctamente.';
        } else {
            return 'Error al enviar el correo: ' . $emailService->printDebugger(['headers']);
        }
    }

}