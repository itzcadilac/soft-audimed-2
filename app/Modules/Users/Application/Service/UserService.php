<?php

namespace Modules\Users\Application\Service;

use Config\Services;
use Modules\Users\Infrastructure\Out\Persistence\Repository\UserRepository;
use Exception;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getActiveUserByDocument($documentNumber)
    {
        try {
            return $this->userRepository->findByDocumentAndStatus($documentNumber, ACTIVE_VALUE);
        } catch (Exception $e) {
            return errorResponse('Ocurrio un error al traer los datos');
        }
    }

    public function updateUserFretry($idUser, $data)
    {

        $logger = Services::logger();

        try {
            $result = $this->userRepository->updateUserFretry($idUser, $data);

            if (!$result) {
                return errorResponse('Ocurrio un error al traer los datos');
            }

            return successResponse($result,'ok');
        } catch (\Throwable $e) {
            $logger->error("Error Catch en UserService: updateUserFretry: ".$e->getMessage());
            return errorResponse('Ocurrio un error al traer los datos');
        }

    }

}
