<?php

namespace Modules\Users\Infrastructure\In\Controller;

use App\Controllers\BaseController;
use Modules\Users\Config\Services as UserServices;
use Config\Services;

class GetUserController extends BaseController
{

    protected $userService;
    protected $logger;

    private const USER_LIST_FORM_PATH = 'Features/usuarios.twig';
    private const USER_DETAIL_FORM_PATH = 'users-module/user_detail.twig';

    public function __construct()
    {
        $this->userService = UserServices::userService();
        $this->logger = Services::logger();
    }

    public function getAllUsersForm()
    {
        return $this->render(self::USER_LIST_FORM_PATH, $this->getDataToListForm());
    }

    private function getDataToListForm()
    {
        $listUsers = $this->userService->getAllWithProfile();
        return array(
            "userList" => $listUsers["data"]
        );
    }

    public function getDetailForm($userId)
    {
        return $this->render(self::USER_DETAIL_FORM_PATH, $this->getDataToDetailForm($userId));
    }

    private function getDataToDetailForm($userId)
    {
        $users = $this->userService->getAllWithProfile($userId);
        $userFound = $users["data"][0];
        $this->logger->debug("usuario encontrado");
        $this->logger->debug(json_encode($userFound));
        return array(
            "user" => $userFound
        );
    }

}
