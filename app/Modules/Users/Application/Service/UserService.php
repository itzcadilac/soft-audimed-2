<?php

namespace Modules\Users\Application\Service;

use Modules\Users\Infrastructure\Out\Persistence\Repository\UserRepository;
use Exception;
use Modules\Users\Domain\User;

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
}
