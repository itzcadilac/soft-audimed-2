<?php

namespace Modules\Accidentado\Infrastructure\In\Controller;

use App\Controllers\BaseController;
use Modules\Accidentado\Config\Services as AccidentadoService;
use Modules\Accidentado\Config\Services as ParametersService;
use Modules\Siniestro\Config\Services as SiniestroServices;
use Config\Services;

class GetAccidentadoController extends BaseController
{
    protected $accidentadoService;
    protected $siniestroService;
    protected $aseguradoraService;
    protected $logger;
    protected $documentTypeService;
    protected $profileService;
    protected $parametersService;
    private const ACCIDENTADO_LIST_FORM_PATH = 'Accidentado/accidentados.twig';
    private const ACCIDENTADO_CONSULTA_FORM_PATH = 'Accidentado/caccidentados.twig';
    private const ACCIDENTADO_EDITAR_FORM_PATH = 'Accidentado/maccidentados.twig';

    public function __construct()
    {
        $this->accidentadoService = AccidentadoService::accidentadoService();
        $this->siniestroService = SiniestroServices::SiniestroService();
        $this->logger = Services::logger();
        $this->aseguradoraService = SiniestroServices::AseguradoraService();
        //$this->profileService = UserServices::profileService();
        //$this->documentTypeService = UserServices::documentTypeService();
        $this->parametersService = ParametersService::parametersService();
    }

    public function getAccidentadosForm($siniestroId)
    {
        return $this->render(self::ACCIDENTADO_LIST_FORM_PATH, $this->getDataAccidentadoToListForm($siniestroId));
    }

    private function getDataAccidentadoToListForm($siniestroId)
    {
        $listAccidentados = $this->accidentadoService->getAllAcciforSiniestro($siniestroId);
        $detsiniestro = $this->siniestroService->findById($siniestroId);
        return array(
            "listAcc" => $listAccidentados["data"],
            "infosiniestro" => $detsiniestro
        );
    }

    public function getDetailConForm($siniestroId)
    {
        return $this->render(self::ACCIDENTADO_CONSULTA_FORM_PATH, $this->getDataAccidentadoToListForm($siniestroId));
    }

    public function getDetailModForm($siniestroId)
    {
        return $this->render(self::ACCIDENTADO_EDITAR_FORM_PATH, $this->getDataAccidentadoToListForm($siniestroId));
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
