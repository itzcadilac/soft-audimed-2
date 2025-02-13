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

    public function __construct()
    {
        $this->userService = UserServices::userService();
        $this->logger = Services::logger();
    }

    public function getAllUsersForm()
    {
        return $this->render(self::USER_LIST_FORM_PATH, $this->getDataToForm());
    }

    private function getDataToForm()
    {
        $listUsers = $this->userService->findAll();
        $this->logger->info(json_encode($listUsers["data"]));
        return array(
            "userList" => $listUsers["data"]
        );
    }

}
