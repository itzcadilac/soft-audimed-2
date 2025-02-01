<?php

namespace Modules\Users\Infrastructure\Out\Persistence\Repository;

use Modules\Users\Infrastructure\Out\Persistence\Model\UserModel;
use Config\Services;
use Exception;
use Modules\Users\Domain\User;

class UserRepository
{
    protected $userModel;
    protected $profileModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function findByDocumentAndStatus($documentNumber, $status)
    {
        $logger = Services::logger();

        try {
            $result = $this->userModel->where('numero_documento', $documentNumber)
                ->where('activo', $status)
                ->first();

            if ($result) {
                return successResponse($result, 'Usuario encontrado.');
            }

            return errorResponse('Usuario no encontrado.');
        } catch (Exception $e) {
            $logger->error("Error Catch en UserRepository----->" + $e->getMessage());

            return errorResponse('Usuario no encontrado.');
        }
    }

    public function save(User $user)
    {
        $logger = Services::logger();

        try {
            $result = $this->userModel->save($user);

            if ($result) {
                return successResponse($result, 'Los datos se guardaron correctamente');
            } else {
                return errorResponse('Hubo un error al guardar');
            }
        } catch (Exception $e) {
            $logger->error("Error Catch en UserRepository: guardarUsuario: " + $e->getMessage());
            return errorResponse('Hubo un error al guardar');
        }
    }
}
