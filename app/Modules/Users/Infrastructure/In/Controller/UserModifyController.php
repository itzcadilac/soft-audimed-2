<?php

namespace Modules\Users\Infrastructure\In\Controller;

use App\Controllers\BaseController;
use Modules\Users\Domain\User;
use Config\Services;
use Exception;
use Modules\Users\Config\Services as UserServices;

class UserModifyController extends BaseController
{
    protected $userRegisterService;
    protected $profileService;
    protected $documentTypeService;
    protected $logger;

    private const USER_REGISTER_FORM_PATH = 'users-module/form-modif-user.twig';

    public function __construct()
    {
        $this->userRegisterService = UserServices::userRegisterService();
        $this->profileService = UserServices::profileService();
        $this->documentTypeService = UserServices::documentTypeService();
        $this->logger = Services::logger();
    }

    public function registerForm()
    {
        return $this->render(self::USER_REGISTER_FORM_PATH, $this->getDataToForm());
    }

    public function resetPasswordAction($userId){
        try{
            return $this->responseOk($this->userRegisterService->resetPassword($userId));
        }catch(Exception $e){
            $this->logger->error($e->getMessage());
            return $this->responseError('Hubo un error al resetear la contraseña.');
        }
    }

    private function getDataToForm()
    {
        $documentTypeList = $this->documentTypeService->getDocumentTypeList();
        $profileList = $this->profileService->getListActiveProfile();
        return array(
            "documentTypeList" => $documentTypeList["data"],
            "profileList" => $profileList["data"]
        );
    }

    public function registerAction()
    {
        try {
            // Obtenemos los datos del request
            $formData = $this->request->getPost();
            // Obtenemos el hash
            $csrfHash = csrf_hash();
            // Validamos el formulario
            $formValidated = $this->validateForm();
            if (!$formValidated->isValid) {
                return $this->responseBusinessError($formValidated->data, $csrfHash);
            }
            // Obtenemos el objeto usuario y lo guardamos
            $user = $this->getUser($formData);
            $result = $this->userRegisterService->registerUser($user);
            // Proceso de respuesta
            if (!$result["success"]) {
                return $this->responseBusinessError($result["message"], $csrfHash);
            }
            return $this->responseCreated('Usuario creado correctamente', $csrfHash);
        } catch (Exception $e) {
            $this->logger->error($e->getMessage());
            $csrfHash = csrf_hash();
            return $this->responseError('Hubo un error al guardar la información.', $csrfHash);
        }
    }

    private function validateForm()
    {
        $validation = array("isValid" => true, "data" => []);

        $rules = [
            'document_type' => 'required',
            'document_number' => 'required',
            'email' => 'required',
            'profile' => 'required'
        ];

        if (!$this->validate($rules)) {
            $validation["isValid"] = false;
            $validation["data"] = $this->validator->getErrors();
        }

        return (object) $validation;
    }

    private function getUser($formData)
    {
        $user = new User();
        $user->idtipodocumento = $formData['document_type'];;
        $user->numero_documento = $formData['document_number'];
        $user->apellidos = $formData['lastname'];
        $user->nombres = $formData['names'];
        $user->usuario = $formData['username'];
        $user->idperfil = $formData['profile'];
        $user->email = $formData['email'];
        return $user;
    }
}
