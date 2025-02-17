<?php

namespace Modules\Gestion\Infrastructure\In\Controller;

use App\Controllers\BaseController;
use Modules\Gestion\Config\Services as GestionServices;
use Modules\Users\Config\Services as UserServices;
use Config\Services;

class GetGestionController extends BaseController
{
    protected $gestionService;
    protected $userService;
    protected $logger;
    private const PERFIL_LIST_FORM_PATH = 'Features/perfiles.twig';

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
	
	// Se obtiene la lista de los perfiles
    private function getDataToListForm()
    {
        $profilesList = $this->gestionService->getAllProfiles();
        // Se recorren los perfiles para obtener toda la de los usuarios y aseguradoras asignadas por perfil
        foreach($profilesList['data'] as $profile):
            // Traemos los usuarios por perfil
            $users = $this->userService->getCountProfileUser($profile->idperfil);
            // Se setea el valor de la cantidad de usuarios en el objeto perfil
            $count = $users['data']->resultID->num_rows;
            $profile->userscount = $count;
            // Se iguala la variable result al array recibido en la funcion
            $result = $count? $users['data']->getResult() : array();
            $insurers = null; $num = 0; $prod = []; $i = 0;
            
            // Se recorren los usuarios obtenidos para obtener las aseguradoras asignadas por perfil y las cantidades
            foreach($result as $row):
                $insurers = $this->gestionService->getAllInsurersUsers($row->idusuario);
                $num += $insurers['data']->resultID->num_rows;
                // Se obtienen los productos totales de cada perfil y se setea en el objeto perfil
                $res = $num? $insurers['data']->getResult() : array();
                foreach($res as $row):
                    if($row->productos !== null || $row->productos !== '') $prod[] = $row->productos;
                endforeach;
            endforeach;
            // Se setea la cantidad de aseguradoras en el objeto perfil
            $profile->insurerscount = $num;
            $product = '';
            // Se setea los productos en el objeto perfil
            if(count($prod) > 0) $product = max($prod);
            $profile->productos = $product;
            //$profile->productos = !is_array($product)? $product : '';
            //var_dump($prod);
            //var_dump($prod);
            //$exp = count((array)$res)? explode(',',$res[0]->productos) : '';
            //$profile->productos = count((array)$exp) > 1? $exp[0].','.$exp[1] : $exp;
        endforeach;

        return array(
            "profilesList" => $profilesList["data"]
        );
    }    
}
