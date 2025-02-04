<?php

namespace Modules\Aseguradora\Infrastructure\In\Controller;

use App\Controllers\BaseController;
use Config\Services;
use Exception;

use Modules\Aseguradora\Config\Services as AseguradoraServices;

class AseguradoraController extends BaseController
{
    protected $aseguradoraService;

    private const USER_REGISTER_FORM_PATH = 'users-module/register-form.twig';

    public function __construct()
    {
        $this->aseguradoraService = AseguradoraServices::aseguradoraService();
    }

    public function getAseguradoraxUser()
    {

        $logger = Services::logger();
        try {

            $result = $this->aseguradoraService->getAseguradoraxUser(12);
            
            if($result["success"]){
                return $this->respond($result, 200);
            }else{
                return $this->respond($result, 200); //No existen datos
            }

        } catch (Exception $e) {

            $logger->error("Error Catch en AseguradoraController: getAseguradoraxUser: "+$e->getMessage());

            $result = [
                'status' => 'error',
                'message' => 'Hubo un error',
            ];

            return $this->respond($result, 400); //error al llamar al EndPoint
        }

    }

    public function getTest()
    {
        return "Hola";
    }

}