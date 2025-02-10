<?php

namespace App\Models\Repository;

use App\Entities\Usuario;
use App\Models\UsuarioModel;
use Config\Services;
use Exception;

class UserRepository
{
    protected $usuarioModel;
    //protected $logger;

    public function __construct()
    {
        // Aquí se puede usar el modelo de usuario para interactuar con la base de datos
        $this->usuarioModel = new UsuarioModel();
        //$this->logger = getLogger();
    }

    public function getUserByDocumentoAndEstado($numero_documento)
    {
        $logger = Services::logger();

        try {
            $result = $this->usuarioModel->where('numero_documento', $numero_documento)
                                  ->where('activo', 1)
                                  ->first();

            if ($result) {
                return successResponse($result, 'Usuario encontrado.');
            }

            return errorResponse('Usuario no encontrado.');

        } catch (Exception $e) {
            $logger->error("Error Catch en UserRepository----->"+$e->getMessage());

            return errorResponse('Usuario no encontrado.');

        }

    }

    public function getAllActiveUsers()
    {
        $logger = Services::logger();

        try {

            //$logger->info("Ingresa a UserRepository: getAllActiveUsers: ");
            
            $result = $this->usuarioModel->select('idusuario, idtipodocumento, numero_documento, avatar, nombres, apellidos, usuario, idperfil')
                                         ->where('activo', 1)
                                         ->findAll();

            //$logger->info("Trae los datos: " . json_encode($result));

            if ($result) {
                //$logger->info("Ingresa en result: " . json_encode($result));
                return successResponse($result, 'Datos encontrados.');
            }else{
                //$logger->info("Ingresa a datos no encontrado: " . json_encode($result));
                return errorResponse('No existen datos');
            }

        } catch (Exception $e) {
            $logger->error("Error Catch en UserRepository: getAllActiveUsers: "+$e->getMessage());
            return errorResponse('Ocurrio un error al traer los datos');
        }

    }

    public function guardarUsuario(Usuario $usuario){

        $logger = Services::logger();

        try {
            $result = $this->usuarioModel->save($usuario);
            
            if ($result) {
                return successResponse($result, 'Los datos se guardaron correctamente');
            }else{
                return errorResponse('Hubo un error al guardar');
            }

        } catch (Exception $e) {
            $logger->error("Error Catch en UserRepository: guardarUsuario: "+$e->getMessage());
            return errorResponse('Hubo un error al guardar');
        }

    }

}