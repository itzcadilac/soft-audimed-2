<?php

namespace Modules\Users\Infrastructure\In\Controller;

use App\Controllers\BaseController;
use Modules\Users\Config\Services as UserServices;
use Config\Services;
use Exception;
use Modules\Users\Domain\User;

class ValidateUsernameController extends BaseController
{

    protected $userService;

    public function __construct()
    {
        $this->userService = UserServices::userService();
    }

    public function getValidateUsernameAction($username = null)
    {
        $logger = Services::logger();
        try {
            $logger->debug('Ingresó a la función getValidateUsernameAction');
            // Obtenemos y validamos los datos del request
            $request = [
                'username' => $username
            ];
            $requestValidated = $this->validateRequest($request);
            if (!$requestValidated->isValid) {
                return $this->responseBusinessError($requestValidated->data);
            }
            // Obtenemos el objeto usuario y realizamos la validacion
            $user = $this->getUser($request);
            $result = $this->userService->getUserByUsername($user);
            // Proceso de respuesta
            if (!$result["success"]) {
                return $this->responseBusinessError($result["message"]);
            }
            return $this->responseOk($result["data"]);
        } catch (Exception $e) {
            $logger->error($e->getMessage());
            return $this->responseError('Hubo un error al guardar la información.');
        }
    }

    private function validateRequest($request)
    {
        $validation = array("isValid" => true, "data" => []);

        $rules = [
            'username' => 'required'
        ];

        $validationService = Services::validation();
        $validationService->setRules($rules);

        if (!$validationService->run($request)) {
            $validation["isValid"] = false;
            $validation["data"] = $this->validator->getErrors();
        }

        return (object) $validation;
    }

    private function getUser($request)
    {
        $person = new User();
        $person->usuario = $request["username"];
        return $person;
    }
}
