<?php

namespace Modules\Users\Infrastructure\In\Controller;

use App\Controllers\BaseController;
use Modules\Users\Domain\User;
use Config\Services;
use Exception;

use Modules\Users\Config\Services as UserServices;

class UserRegisterController extends BaseController
{
    protected $userService;
    protected $profileService;

    private const USER_REGISTER_FORM_PATH = 'users-module/register-form.twig';

    public function __construct()
    {
        $this->userService = UserServices::userService();
        $this->profileService = UserServices::profileService();
    }

    public function registerForm()
    {
        return $this->render(self::USER_REGISTER_FORM_PATH, $this->getDataToForm());
    }

    private function getDataToForm()
    {
        $profileList = $this->profileService->getListActiveProfile();
        return array(
            "profileList" => $profileList["data"]
        );
    }


    public function registerAction()
    {
        $data = $this->request->getPost();
        $logger = Services::logger();

        try {
            $logger->debug('Ingresó a la función registroUsuario');

            $userRegisterForm = $this->registerFormValidation();
            if (!$userRegisterForm["isValid"]) {
                return $this->respond($userRegisterForm["data"], 400);
            }

            $user = new User();
            $user->idtipodocumento = 1;
            $user->numero_documento = $data['num_documento'];
            $user->apellidos = $data['apellidos'];
            $user->nombres = $data['nombres'];
            $user->usuario = $data['num_documento'];
            $user->idperfil = 1;
            $user->activo = '1';

            $result = $this->userService->registerUser($user);

            $csrfHash = csrf_hash();

            $data = [
                'status' => 'success',
                'message' => 'Usuario creado correctamente',
                'csrf_hash_gen' => $csrfHash,
            ];

            if ($result["success"]) {
                return $this->respond($data, 201);
            } else {
                return $this->respond($data, 400); //Error
            }

            //return $this->respond($data, 201); // Código 201 Created

        } catch (Exception $e) {
            $logger->error($e->getMessage());

            $csrfHash = csrf_hash();

            $data = [
                'status' => 'error',
                'message' => 'Hubo un error al guardar la información.',
                'csrf_hash_gen' => $csrfHash,
            ];

            return $this->respond($data, 400);
        }
    }

    private function registerFormValidation()
    {
        $validation = array("isValid" => true, "data" => []);

        $rules = [
            'num_documento' => 'required|min_length[3]|max_length[50]'
        ];

        if (!$this->validate($rules)) {
            $errors = $this->validator->getErrors();
            $csrfHash = csrf_hash();
            $data = [
                'status' => 'error',
                'message' => $errors,
                'csrf_hash_gen' => $csrfHash,
            ];

            $validation["isValid"] = false;
            $validation["data"] = $data;
        }

        return $validation;
    }

    public function getAllActiveUsers()
    {

        $logger = Services::logger();
        try {

            $result = $this->userService->getAllActiveUsers();

            if ($result["success"]) {
                return $this->respond($result, 200);
            } else {
                return $this->respond($result, 400); //No existen datos
            }
        } catch (Exception $e) {

            $logger->error("Error Catch en RegistroUserController: getAllActiveUsers: " + $e->getMessage());

            $result = [
                'status' => 'error',
                'message' => 'Hubo un error',
            ];

            return $this->respond($result, 400); //error al llamar al EndPoint
        }
    }
}
