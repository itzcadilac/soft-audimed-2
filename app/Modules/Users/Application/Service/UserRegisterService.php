<?php

namespace Modules\Users\Application\Service;

use Modules\Users\Domain\User;
use Modules\Users\Infrastructure\Out\Persistence\Repository\UserRepository;
use Exception;

class UserRegisterService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function registerUser(User $user)
    {
        try {
            return $this->userRepository->save($user);
        } catch (Exception $e) {
            return errorResponse('Ocurrio un error al traer los datos');
        }
    }
}
