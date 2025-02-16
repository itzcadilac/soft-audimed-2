<?php

namespace Modules\Users\Infrastructure\In\Controller;

use App\Controllers\BaseController;
use Modules\Users\Domain\User;
use Config\Services;
use Exception;
use Modules\Users\Config\Services as UserServices;

class UserRegisterController extends BaseController
{
    protected $userRegisterService;
    protected $profileService;
    protected $documentTypeService;
    protected $logger;

    private const USER_REGISTER_FORM_PATH = 'users-module/form-register.twig';

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
            // Inicializamos la variable en la cual se obtiene el resultado de la creación o modificación del usuario
            $result = null; $edit = null;
            // Obtenemos el hash
            $csrfHash = csrf_hash();
            // Validamos el formulario
            $formValidated = $this->validateForm();
            if (!$formValidated->isValid) {
                return $this->responseBusinessError($formValidated->data, $csrfHash);
            }
            // Obtenemos el objeto usuario
            $user = $this->getUser($formData);
            // Validamos si es registro o modificacion
            if($this->request->getPost('edit')){
                $result = $this->userRegisterService->updateUser($user, $this->request->getPost('edit'));
                $edit = true;
            }else{
                $result = $this->userRegisterService->registerUser($user);
                $edit = false;
            }
            // Proceso de respuesta
            if (!$result["success"]) {
                return $this->responseBusinessError($result["message"], $csrfHash);
            }
            
            return !$edit? $this->responseCreated('Usuario creado correctamente', $csrfHash) :
                            $this->responseUpdate('Usuario Actualizado correctamente', $result, $csrfHash);
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
        $user->movil = $this->request->getPost('edit')? $formData['phone'] : '';
        return $user;
    }
}
