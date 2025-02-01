<?php

namespace Modules\Users\Application\Service;

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
}
