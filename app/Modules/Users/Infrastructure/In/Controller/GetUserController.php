<?php

namespace Modules\Users\Infrastructure\In\Controller;

use App\Controllers\BaseController;
use Modules\Users\Config\Services as UserServices;
use Modules\Users\Config\Services as ParametersService;
use Modules\Siniestro\Config\Services as SiniestroServices;
use Config\Services;

class GetUserController extends BaseController
{
    protected $userService;
    protected $aseguradoraService;
    protected $logger;
    protected $documentTypeService;
    protected $profileService;
    protected $parametersService;
    private const USER_LIST_FORM_PATH = 'Features/usuarios.twig';
    private const USER_DETAIL_FORM_PATH = 'users-module/user_detail.twig';
    private const USER_MOV_FORM_PATH = 'Features/movimientosusuario.twig';
    private const USER_AUD_FORM_PATH = 'Features/auditoriausuario.twig';
    private const USER_DETAIL_MOD_FORM_PATH = 'users-module/form-modif-user.twig';

    public function __construct()
    {
        $this->userService = UserServices::userService();
        $this->logger = Services::logger();
        $this->aseguradoraService = SiniestroServices::AseguradoraService();
        $this->profileService = UserServices::profileService();
        $this->documentTypeService = UserServices::documentTypeService();
        $this->parametersService = ParametersService::parametersService();
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

    public function getDetailModForm($userId)
    {
        return $this->render(self::USER_DETAIL_MOD_FORM_PATH, $this->getDataToDetailForm($userId));
    }

    private function getDataToDetailForm($userId)
    {
        $documentTypeList = $this->documentTypeService->getDocumentTypeList();
        $profileList = $this->profileService->getListActiveProfile();
        $estadoRegList = $this->parametersService->getListEstadoReg();
        $users = $this->userService->getAllWithProfile($userId);
        $userFound = $users["data"][0];
        $insuranceCompany = $this->aseguradoraService->getAseguradoraxUser($userFound->idusuario, $userFound->idperfil);
        $movements = $this->userService->getMovLimUser($userId);
        $audits = $this->userService->getAuditLimUser($userId);
        return array(
            "user" => $userFound,
            "insuranceCompanyList" => $insuranceCompany["data"],
            "movements" => $movements["data"],
            "audits" => $audits["data"],
            "documentTypeList" => $documentTypeList["data"],
            "profileList" => $profileList["data"],
            "estadoreg" => $estadoRegList["data"]
        );
    }

    public function getMovemenstDetailForm($userId)
    {
        return $this->render(self::USER_MOV_FORM_PATH, $this->getDataUserMovForm($userId));
    }

    private function getDataUserMovForm($userId)
    {
        $movtUsers = $this->userService->getMovUser($userId);
        $users = $this->userService->getAllWithProfile($userId);
        $userFound = $users["data"][0];
        return array(
            "userMov" => $movtUsers["data"],
            "user" => $userFound
        );
    }

    private function getDataUserMovLimForm($userId)
    {
        $movtLimUsers = $this->userService->getMovLimUser($userId);
        return array(
            "userMovLim" => $movtLimUsers["data"]
        );
    }

    public function getAuditoryDetailForm($userId)
    {
        return $this->render(self::USER_AUD_FORM_PATH, $this->getDataUserAudForm($userId));
    }

    private function getDataUserAudForm($userId)
    {
        $auditUsers = $this->userService->getAuditUser($userId);
        $users = $this->userService->getAllWithProfile($userId);
        $userFound = $users["data"][0];
        return array(
            "userAudit" => $auditUsers["data"],
            "user" => $userFound
        );
    }

    private function getDataUserAudLimForm($userId)
    {
        $auditLimUsers = $this->userService->getAuditLimUser($userId);
        return array(
            "userAuditLim" => $auditLimUsers["data"]
        );
    }
    
}
