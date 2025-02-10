<?php

namespace App\Services\Impl;

use App\Entities\Usuario;
use App\Models\Repository\UserRepository;
use CodeIgniter\Events\Events;
use CodeIgniter\Session\Session;
use Config\Services;
use Exception;

class UserServiceImpl //implements UserService
{
    protected $userRepository;
    protected $session;
    protected $moduloxPerfilService;
    //protected $logger;

    public function __construct(UserRepository $userRepository,Session $session)
    {
        // Cargar la capa de acceso a datos
        $this->userRepository = $userRepository;
        $this->session = $session;
        //$this->logger = getLogger();
    }

    public function getAuthenticateUser($numero_documento, $password)
    {
        $logger = Services::logger();
        $this->moduloxPerfilService = service('moduloPerfilService');// Services::moduloPerfilService();

        try {
            // Buscar al usuario por documento y estado
            
            $result = $this->getUserByDocumentoAndEstado($numero_documento);

            if ($result['success']) {

                $user = $result['data'];

                //Verificamos si el usuario tiene opciones asignadas
                $moduloxPerfil = $this->moduloxPerfilService->getModulosxPerfil($user['idperfil']);

                $logger->info("Trae la relacion de modulos: " . json_encode($moduloxPerfil));

                if($moduloxPerfil["success"]){
                    $array_modulos = $moduloxPerfil["data"];

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
                        ]);
    
                        return successResponse($result, 'Sesion iniciada');
                    }else{
                        $logger->error("Usuario o pass incorrectos");
                        return errorResponse('Error en la autenticación');
                    }

                }else{
                    $logger->error("Usuario no tiene modulos asignados");
                    return errorResponse('Usuario no tiene modulos asignados');
                }
            }else{
                return errorResponse('No existen datos en getUserByDocumentoAndEstado');
            }

        } catch (Exception $e) {
            $logger->error("Error Catch en UserServiceImpl -> getAuthenticateUser -> " . $e->getMessage());
            return errorResponse('Error en la autenticacion');
        }

    }

    public function getUserByDocumentoAndEstado($numero_documento)
    {

        $logger = Services::logger();
        
        try {
            $result = $this->userRepository->getUserByDocumentoAndEstado($numero_documento);
            return $result;
        } catch (Exception $e) {
            $logger->error("Error Catch en UserServiceImpl -> getUserByDocumentoAndEstado -> "+$e->getMessage());
            return errorResponse('Usuario no encontrado.');
        }

    }

    public function getAllActiveUsers()
    {
        $logger = Services::logger();

        try {
            
            $result = $this->userRepository->getAllActiveUsers();
            //$logger->info("Datos en ServiceImpl: " . json_encode($result));
            return $result;
        } catch (Exception $e) {
            $logger->error("Error Catch en UserServiceImpl: getAllActiveUsers: "+$e->getMessage());
            return errorResponse('Ocurrio un error al traer los datos');
        }

    }

    public function guardarUsuario(Usuario $usuario)
    {

        $logger = Services::logger();
        
        try {
            return $this->userRepository->guardarUsuario($usuario);
        } catch (Exception $e) {
            return errorResponse('Ocurrio un error al traer los datos');
        }

        
    }

    /*
    public function createUser($userData)
    {
        if (empty($userData['numero_documento'])) {
            return false;
        }

        return $this->userRepository->createUser($userData);
    }
    */

}