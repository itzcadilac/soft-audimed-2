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
        return $this->usuarioModel->where('activo', 1)->findAll();
    }

    public function guardarUsuario(Usuario $usuario){

        if ($this->usuarioModel->save($usuario)) {
            return true;
        }

        return false;
    }

}