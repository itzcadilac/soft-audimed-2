<?php

namespace Modules\Gestion\Infrastructure\In\Controller;

use App\Controllers\BaseController;
use Modules\Gestion\Config\Services as GestionServices;
use Modules\Users\Config\Services as UserServices;
use Config\Services;
use Modules\Gestion\Domain\Profile;

class GetGestionController extends BaseController
{
    protected $gestionService;
    protected $userService;
    protected $logger;
    private const PERFIL_LIST_FORM_PATH = 'Features/perfiles.twig';
    private const PERFIL_DETAIL_FORM_PATH = 'gestion-module/perfil_detail.twig';

    public function __construct()
    {
        $this->gestionService = GestionServices::gestionService();
        $this->userService = UserServices::userService();
        $this->logger = Services::logger();
    }
	
	// View que muestra la lista de todos los perfiles
	public function getAllProfilesForm()
    {
        return $this->render(self::PERFIL_LIST_FORM_PATH, $this->getDataToListForm());
    }

    // View que muestra el detalle del perfil seleccionado
    public function getDetailForm($perfilId)
    {
        return $this->render(self::PERFIL_DETAIL_FORM_PATH, $this->getDataToDetailForm($perfilId));
    }
	
	// Se obtiene la lista de los perfiles
    private function getDataToListForm()
    {
        $profilesList = $this->gestionService->getAllProfiles();
        $i = 0;
        // Se recorren los perfiles para obtener toda la de los usuarios y aseguradoras asignadas por perfil
        foreach($profilesList['data'] as $row):
            $prod = '';
            foreach($row->insurers as $col):
                if(strlen($col->productos) > $i){ $prod = $col->productos; $i = strlen($col->productos); }
            endforeach;
            $row->producto = $prod;
        endforeach;

        return array(
            'profilesList' => $profilesList['data']
        );
    }    

    // Se obtiene el detalle del perfil seleccionado
    private function getDataToDetailForm($perfilId)
    {
        $profile = $this->gestionService->getProfileById($perfilId);
        $i = 0; $prod = '';
        if(is_array($profile['data'][0]->insurers)):
            foreach($profile['data'][0]->insurers as $row):
                if(strlen($row->productos) > $i){ $prod = $row->productos; $i = strlen($row->productos); }
            endforeach;
        endif;
        $profile['data'][0]->producto = $prod;
        
        return array(
            'profile' => $profile['data'][0],
            'path' => base_url()
        );
    }
}
