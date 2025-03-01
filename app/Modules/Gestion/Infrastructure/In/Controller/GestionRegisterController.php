<?php

namespace Modules\Gestion\Infrastructure\In\Controller;

use App\Controllers\BaseController;
use Modules\Gestion\Domain\Profile;
use Config\Services;
use Exception;
use Modules\Gestion\Config\Services as GestionServices;

class GestionRegisterController extends BaseController
{
    protected $gestionRegisterService;
    protected $logger;

    public function __construct()
    {
        $this->gestionRegisterService = GestionServices::gestionRegisterService();
        $this->logger = Services::logger();
    }

    public function profileUpdate()
    {
        try {
            // Obtenemos los datos del request
            $formData = $this->request->getPost();
            // Obtenemos el hash
            $csrfHash = csrf_hash();
            // Inicializamos el objeto perfil
            $profile = new Profile();
            $profile->perfil = $formData['perfil'];
            $profile->idperfil = $formData['id'];
            
            $result = $this->gestionRegisterService->updateProfile($profile, $formData['id'], $this->request->getPost('profileold'));
            
            // Proceso de respuesta
            if (!$result["success"]) {
                return $this->responseBusinessError($result["message"], $csrfHash);
            }
            
            return $this->responseUpdate('Perfil Actualizado correctamente', $result, $csrfHash);
        } catch (Exception $e) {
            $this->logger->error($e->getMessage());
            $csrfHash = csrf_hash();
            return $this->responseError('Hubo un error al guardar la información.', $csrfHash);
        }
    }

    public function profileActivate()
    {
        try {
            // Obtenemos los datos del request
            $formData = $this->request->getPost();
            // Obtenemos el hash
            $csrfHash = csrf_hash();
            // Inicializamos el objeto perfil
            $profile = new Profile();
            $profile->activo = intval($formData['activo']);
            $profile->idperfil = $formData['id'];
            // Se ejecuta el query
            $result = $this->gestionRegisterService->profileActivate($profile, $formData['id'], $formData['profile']);
            
            // Proceso de respuesta
            if (!$result["success"]) {
                return $this->responseBusinessError($result["message"], $csrfHash);
            }
            
            return $this->responseUpdate('Perfil Actualizado correctamente', $result, $csrfHash);
        } catch (Exception $e) {
            $this->logger->error($e->getMessage());
            $csrfHash = csrf_hash();
            return $this->responseError('Hubo un error al guardar la información.', $csrfHash);
        }
    }

    public function profileBloq()
    {
        try {
            // Obtenemos los datos del request
            $formData = $this->request->getPost();
            // Obtenemos el hash
            $csrfHash = csrf_hash();
            // Inicializamos el objeto perfil
            $profile = new Profile();
            $profile->estadoreg = $formData['estadoreg'] === '0'? '0' : intval($formData['estadoreg']);
            $profile->idperfil = $formData['id'];
            // Se ejecuta el query
            $result = $this->gestionRegisterService->profileBloq($profile, $formData['id'], $formData['profile']);
            
            // Proceso de respuesta
            if (!$result["success"]) {
                return $this->responseBusinessError($result["message"], $csrfHash);
            }
            
            return $this->responseUpdate('Perfil Actualizado correctamente', $result, $csrfHash);
        } catch (Exception $e) {
            $this->logger->error($e->getMessage());
            $csrfHash = csrf_hash();
            return $this->responseError('Hubo un error al guardar la información.', $csrfHash);
        }
    }

    public function profileDel()
    {
        try {
            // Obtenemos los datos del request
            $formData = $this->request->getPost();
            // Obtenemos el hash
            $csrfHash = csrf_hash();
            // Inicializamos el objeto perfil
            $profile = new Profile();
            $profile->estadoreg = intval($formData['estadoreg']);
            $profile->eliminado = intval($formData['eliminado']);
            $profile->idperfil = $formData['id'];
            // Se ejecuta el query
            $result = $this->gestionRegisterService->profileDel($profile, $formData['id'], $formData['profile']);
            
            // Proceso de respuesta
            if (!$result["success"]) {
                return $this->responseBusinessError($result["message"], $csrfHash);
            }
            
            return $this->responseUpdate('Perfil Actualizado correctamente', $result, $csrfHash);
        } catch (Exception $e) {
            $this->logger->error($e->getMessage());
            $csrfHash = csrf_hash();
            return $this->responseError('Hubo un error al guardar la información.', $csrfHash);
        }
    }
}
