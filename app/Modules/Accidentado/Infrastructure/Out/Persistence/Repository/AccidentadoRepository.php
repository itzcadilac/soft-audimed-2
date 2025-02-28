<?php

namespace Modules\Accidentado\Infrastructure\Out\Persistence\Repository;

use Modules\Accidentado\Infrastructure\Out\Persistence\Model\AccidentadoModel;
use Modules\Users\Infrastructure\Out\Persistence\Model\MovUserModel;
use Modules\Users\Infrastructure\Out\Persistence\Model\AuditUserModel;
use Modules\Accidentado\Domain\Accidentado;
use Modules\Users\Domain\MovUser;
use Modules\Users\Domain\AuditUser;
use Config\Services;
use Exception;

use function PHPUnit\Framework\isNull;

class AccidentadoRepository
{
    protected $accidentadoModel;
    protected $userMovModel;
    protected $userAuditModel;
    protected $logger;

    public function __construct()
    {
        $this->accidentadoModel = new AccidentadoModel();
        $this->userMovModel = new MovUserModel();
        $this->userAuditModel = new AuditUserModel();
        $this->logger = Services::logger();
    }

    public function findById($userId){
        try {
            // Realizamos la query
            $result = $this->userModel->find($userId);
            // Si no se pudo obtener el registro devolvemos un error
            if (!$result) {
                return errorResponse('Usuario no encontrado.');
            }
            // Si se logro obtener el registro lo devolvemos en la respuesta
            return successResponse($result);
        } catch (Exception $e) {
            $this->logger->error("UserRepository -> findById: {$e->getMessage()}");
            return errorResponse();
        }
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
            //$result = $this->userModel->where('usuario', $username)->first();

            $result = $this->userModel
                        ->where('usuario', $username)
                        ->where('activo', 1)
                        ->where('estadoreg', 0)
                        ->first();

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
            // Si el registro se guardo correctamente obtenemos si id
            if (isNull($user->idusuario)) {
                $savedUserId = $this->userModel->insertID();
                $savedUser = $this->userModel->find($savedUserId);
            } else {
                $savedUser = $user;
            }
            // Si el registro se guardo correctamente lo devolvemos en la respuesta
            return successResponse($savedUser);
        } catch (Exception $e) {
            $this->logger->error("Error Catch en UserRepository: guardarUsuario: " . $e->getMessage());
            return errorResponse();
        }
    }

    public function update(User $user, $id)
    {
        try {
            // LLenamos los campos de auditoria
            $this->insertAuditData($user);
            // Realizamos la query
            $result = $this->userModel->update($id, $user);
            // Si no se pudo actualizar el registro devolvemos un error
            if (!$result) {
                return errorResponse('No se pudo guardar el registro en: usuarios');
            }
            // Si el registro se actualizo correctamente buscamos el usuario por su id
            $updateUser = $this->userModel->find($id);
            // Lo devolvemos en la respuesta
            return successResponse($updateUser);
        } catch (Exception $e) {
            $this->logger->error("Error Catch en UserRepository: update: " . $e->getMessage());
            return errorResponse();
        }
    }

    private function insertAuditData(User $user)
    {
        if (isNull($user->idusuario)) {
            $user->createdat = date("Y-m-d H:m:s");
        } else {
            $user->updatedat = date("Y-m-d H:m:s");
        }
    }


    public function updateUserFretry($idUser, $data)
    {
        return $this->userModel->update($idUser, $data);
    }
    
    public function findAll()
    {
        try {
            // Realizamos la query
            $result = $this->userModel->findAll();
            // Si no se pudo obtener el registro devolvemos un error
            if (!$result) {
                return errorResponse('No hay usuarios para mostrar.');
            }
            // Si se logro obtener el registro lo devolvemos en la respuesta
            return successResponse($result);
        } catch (Exception $e) {
            $this->logger->error("UserRepository -> findAll: {$e->getMessage()}");
            return errorResponse();
        }
    }

    public function findAllAcciofSiniestro($siniestroId = null)
    {
        try {
            // Realizamos la query
            $result = $this->accidentadoModel->getAccidentadosXSiniestro($siniestroId);
            // Si no se pudo obtener el registro devolvemos un error
            if (!$result) {
                return errorResponse('No hay accidentados para mostrar.');
            }
            // Si se logro obtener el registro lo devolvemos en la respuesta
            return successResponse($result);
        } catch (Exception $e) {
            $this->logger->error("AccidentadoRepository -> findAllAcciofSiniestro: {$e->getMessage()}");
            return errorResponse();
        }
    }

    public function findAllMovUser($userId = null)
    {
        try {
            // Realizamos la query
            $result = $this->userMovModel->getUserMovements($userId);
            // Si no se pudo obtener el registro devolvemos un error
            if (!$result) {
                return errorResponse('No hay movimientos para mostrar.');
            }
            // Si se logro obtener el registro lo devolvemos en la respuesta
            return successResponse($result);
        } catch (Exception $e) {
            $this->logger->error("UserRepository -> findAllMovUser: {$e->getMessage()}");
            return errorResponse();
        }
    }

    public function findAllAuditUser($userId = null)
    {
        try {
            // Realizamos la query
            $result = $this->userAuditModel->getUserAuditory($userId);
            // Si no se pudo obtener el registro devolvemos un error
            if (!$result) {
                return errorResponse('No hay movimientos para mostrar.');
            }
            // Si se logro obtener el registro lo devolvemos en la respuesta
            return successResponse($result);
        } catch (Exception $e) {
            $this->logger->error("UserRepository -> findAllAuditUser: {$e->getMessage()}");
            return errorResponse();
        }
    }

    public function findLimMovUser($userId = null)
    {
        try {
            // Realizamos la query
            $result = $this->userMovModel->getUserMovementsLim($userId);
            // Si no se pudo obtener el registro devolvemos un error
            if (!$result) {
                return errorResponse('No hay movimientos para mostrar.');
            }
            // Si se logro obtener el registro lo devolvemos en la respuesta
            return successResponse($result);
        } catch (Exception $e) {
            $this->logger->error("UserRepository -> findLimMovUser: {$e->getMessage()}");
            return errorResponse();
        }
    }

    public function findLimAuditUser($userId = null)
    {
        try {
            // Realizamos la query
            $result = $this->userAuditModel->getUserAuditoryLim($userId);
            // Si no se pudo obtener el registro devolvemos un error
            if (!$result) {
                return errorResponse('No hay movimientos para mostrar.');
            }
            // Si se logro obtener el registro lo devolvemos en la respuesta
            return successResponse($result);
        } catch (Exception $e) {
            $this->logger->error("UserRepository -> findLimAuditUser: {$e->getMessage()}");
            return errorResponse();
        }
    }

}
