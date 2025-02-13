<?php

namespace Modules\Users\Application\Service;

use Config\Services;
use Modules\Users\Infrastructure\Out\Persistence\Repository\UserRepository;
use Exception;
use Modules\Users\Domain\User;

class UserService
{
    protected $userRepository;
    protected $logger;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
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

    public function getAllWithProfile($userId = null){
        return $this->userRepository->findAllWithProfile($userId);
    }
}
