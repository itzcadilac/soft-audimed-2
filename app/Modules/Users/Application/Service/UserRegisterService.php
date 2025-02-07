<?php

namespace Modules\Users\Application\Service;

use Modules\Users\Domain\User;
use Modules\Users\Infrastructure\Out\Persistence\Repository\UserRepository;
use Exception;

use Modules\Notifications\Config\Services as NotificationServices;

class UserRegisterService
{
    protected $userRepository;
    protected $notificationUserService;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->notificationUserService = NotificationServices::notificationUserService();
    }

    public function registerUser(User $user)
    {
        try {
            /*$userFound = $this->userRepository->findByDocument($user->numero_documento);
            if($userFound["success"]){
                return errorResponse("El usuario con el documento indicado ya existe!!");
            }*/
            $dataNotification = [
                "templateCode" => "EMAIL_CONF_ACCOUNT",
                "to" => $user->email,
                "nameTo" => $user->getFullName()
            ];
            $this->notificationUserService->sendCreatedUser($dataNotification);
            return $this->userRepository->save($user);
        } catch (Exception $e) {
            return errorResponse('Ocurrio un error al traer los datos');
        }
    }
}
