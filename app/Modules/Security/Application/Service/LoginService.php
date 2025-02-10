<?php

namespace Modules\Security\Application\Service;

use CodeIgniter\Session\Session;
use Config\Services;
use Exception;

use Modules\Users\Config\Services as UserServices;

class LoginService
{
    protected $session;
    protected $moduleByProfileService;
    protected $userService;

    public function __construct(Session $session)
    {
        $this->session = $session;

        $this->moduleByProfileService = UserServices::moduleByProfileService();
        $this->userService = UserServices::userService();
    }

    public function loginUser($documentNumber, $password, $ipAddress, $hostname)
    {
        $logger = Services::logger();

        try {
            $result = $this->userService->getActiveUserByDocument($documentNumber);

            if ($result['success']) {
                $user = $result['data'];

                //Verificamos si el usuario tiene opciones asignadas
                $moduleByProfile = $this->moduleByProfileService->getListModuleByProfile($user['idperfil']);

                $logger->info("Trae la relacion de modulos: " . json_encode($moduleByProfile));

                if ($moduleByProfile["success"]) {
                    $array_modulos = $moduleByProfile["data"];

                    if (password_verify($password, $user['passwd'])) {
                        // Guardar datos del usuario en la sesión
                        $this->session->set([
                            'idusuario' => $user['idusuario'],
                            'numero_documento' => $user['numero_documento'],
                            'apellidos' => $user['apellidos'],
                            'nombres' => $user['nombres'],
                            'usuario' => $user['usuario'],
                            'idperfil' => $user['idperfil'],
                            'modulosUsuario' => $array_modulos,
                            'isLoggedIn' => true,
                            'ipAddress' => $ipAddress,
                            'hostname' => $hostname
                        ]);

                        return successResponse($result, 'Sesion iniciada');
                    } else {
                        $logger->error("Usuario o pass incorrectos");
                        return errorResponse('Error en la autenticación');
                    }
                } else {
                    $logger->error("Usuario no tiene modulos asignados");
                    return errorResponse('Usuario no tiene modulos asignados');
                }
            } else {
                return errorResponse('No existen datos en getUserByDocumentoAndEstado');
            }
        } catch (Exception $e) {
            $logger->error("Error Catch en UserServiceImpl -> getAuthenticateUser -> " . $e->getMessage());
            return errorResponse('Error en la autenticacion');
        }
    }
}
