<?php

namespace Modules\Users\Infrastructure\In\Controller;

use App\Controllers\BaseController;
use Modules\Users\Config\Services as UserServices;
use Modules\Siniestro\Config\Services as SiniestroServices;
use Config\Services;

class GetUserController extends BaseController
{
    protected $userService;
    protected $aseguradoraService;
    protected $logger;

    private const USER_LIST_FORM_PATH = 'Features/usuarios.twig';
    private const USER_DETAIL_FORM_PATH = 'users-module/user_detail.twig';

    public function __construct()
    {
        $this->userService = UserServices::userService();
        $this->logger = Services::logger();
        $this->aseguradoraService = SiniestroServices::AseguradoraService();
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
        $insuranceCompany = $this->aseguradoraService->getAseguradoraxUser($userFound->idusuario, $userFound->idperfil);
        return array(
            "user" => $userFound,
            "insuranceCompanyList" => $insuranceCompany["data"]
        );
    }

}
