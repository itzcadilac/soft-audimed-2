<?php

namespace Modules\Users\Infrastructure\Out\Persistence\Repository;

use Modules\Users\Infrastructure\Out\Persistence\Model\UserModel;
use Modules\Users\Domain\User;
use Config\Services;
use Exception;

use function PHPUnit\Framework\isNull;

class UserRepository
{
    protected $userModel;
    protected $logger;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->logger = Services::logger();
    }

    public function findByDocumentAndStatus($documentNumber, $status)
    {
        try {
            // Realizamos la query
            $result = $this->userModel->where('numero_documento', $documentNumber)
                ->where('activo', $status)
                ->first();
            // Si no se pudo obtener el registro devolvemos un error
            if (!$result) {
                return errorResponse('Usuario no encontrado.');
            }
            // Si se logro obtener el registro lo devolvemos en la respuesta
            return successResponse($result);
        } catch (Exception $e) {
            $this->logger->error("UserRepository -> findByDocumentAndStatus: {$e->getMessage()}");
            return errorResponse();
        }
    }

    public function findByDocument($documentNumber)
    {
        try {
            // Realizamos la query
            $result = $this->userModel->where('numero_documento', $documentNumber)
                ->first();
            // Si no se pudo obtener el registro devolvemos un error
            if (!$result) {
                return errorResponse('Usuario no encontrado.');
            }
            // Si se logro obtener el registro lo devolvemos en la respuesta
            return successResponse($result);
        } catch (Exception $e) {
            $this->logger->error("UserRepository -> findByDocument: {$e->getMessage()}");
            return errorResponse();
        }
    }

    public function findByUsername($username)
    {
        try {
            // Realizamos la query
            $result = $this->userModel->where('usuario', $username)->first();
            // Si no se pudo obtener el registro devolvemos un error
            if (!$result) {
                return errorResponse('Usuario no encontrado.');
            }
            // Si se logro obtener el registro lo devolvemos en la respuesta
            return successResponse($result);
        } catch (Exception $e) {
            $this->logger->error("UserRepository -> findByUsername: {$e->getMessage()}");
            return errorResponse();
        }
    }

    public function save(User $user)
    {
        try {
            // LLenamos los campos de auditoria
            $this->insertAuditData($user);
            // Realizamos la query
            $result = $this->userModel->save($user);
            // Si no se pudo guardar el registro devolvemos un error
            if (!$result) {
                return errorResponse('No se pudo guardar el registro en: personas');
            }
            // Si el registro se guardo correctamente lo devolvemos en la respuesta
            return successResponse($result);
        } catch (Exception $e) {
            $this->logger->error("UserRepository -> save: {$e->getMessage()}");
            return errorResponse();
        }
    }

    private function insertAuditData(User $user)
    {
        if (isNull($user->idusuario)) {
            $user->fcreated = date("Y-m-d H:m:s");
        } else {
            $user->fupdated = date("Y-m-d H:m:s");
        }
    }
}
