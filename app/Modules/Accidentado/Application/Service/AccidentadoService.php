<?php

namespace Modules\Accidentado\Application\Service;

use Config\Services;
use Modules\Accidentado\Infrastructure\Out\Persistence\Repository\AccidentadoRepository;
use Exception;
use Modules\Accidentado\Domain\Accidentado;

class AccidentadoService
{
    protected $accidentadoRepository;
    protected $logger;

    public function __construct(AccidentadoRepository $accidentadoRepository)
    {
        $this->accidentadoRepository = $accidentadoRepository;
        $this->logger = Services::logger();

    }

    public function getActiveUserByDocument($documentNumber)
    {
        try {
            return $this->userRepository->findByDocumentAndStatus($documentNumber, ACTIVE_VALUE);
        } catch (Exception $e) {
            return errorResponse();
        }
    }

    public function getUserByUsername(User $user){
        try {
            return $this->userRepository->findByUsername($user->usuario);
        } catch (Exception $e) {
            return errorResponse();
        }
    }

    public function updateUserFretry($idUser, $data)
    {
        try {
            $result = $this->userRepository->updateUserFretry($idUser, $data);

            if (!$result) {
                return errorResponse('Ocurrio un error al traer los datos');
            }

            return successResponse($result,'ok');
        } catch (\Throwable $e) {
            $this->logger->error("Error Catch en UserService: updateUserFretry: ".$e->getMessage());
            return errorResponse('Ocurrio un error al traer los datos');
        }

    }

    public function findAll()
    {
        return $this->userRepository->findAll();
    }

    public function getAllAcciforSiniestro($siniestroId = null){
        return $this->accidentadoRepository->findAllAcciofSiniestro($siniestroId);
    }

    public function getMovUser($userId = null){
        return $this->userRepository->findAllMovUser($userId);
    }

    public function getAuditUser($userId = null){
        return $this->userRepository->findAllAuditUser($userId);
    }

    public function getMovLimUser($userId = null){
        return $this->userRepository->findLimMovUser($userId);
    }

    public function getAuditLimUser($userId = null){
        return $this->userRepository->findLimAuditUser($userId);
    }

}
