<?php

namespace Modules\Gestion\Infrastructure\Out\Persistence\Repository;

use Modules\Gestion\Infrastructure\Out\Persistence\Model\ProfileModel;
use Modules\Gestion\Infrastructure\Out\Persistence\Model\InsurerPerfilModel;
use Modules\Gestion\Domain\Profile;
use Modules\Gestion\Domain\InsurerPerfil;
use Config\Services;
use Exception;

use function PHPUnit\Framework\isNull;

class GestionRepository
{
    protected $profileModel;
    protected $insurerModel;
    protected $logger;

    public function __construct()
    {
        $this->profileModel = new ProfileModel();
        $this->insurerPerfilModel = new InsurerPerfilModel();
        $this->logger = Services::logger();
    }

    public function findProfiles()
    {
        try {
            // Realizamos la query
            $profile = $this->profileModel->findAll();
            // Si no se pudo obtener el registro devolvemos un error
            if (!$profile) {
                return errorResponse('No hay perfiles para mostrar');
            }
            // Se llama a la funcion encargada de setear las propiedades faltantes
            $this->setAttributesToProfile($profile);
            // Si se logro obtener el registro lo devolvemos en la respuesta
            return successResponse($profile);
        } catch (Exception $e) {
            $this->logger->error("GestionRepository -> findProfiles: {$e->getMessage()}");
            return errorResponse();
        }
    }

    public function findProfileById($perfilId = null)
    {
        try {
            // Realizamos la query
            $profile = $this->profileModel->findProfileById($perfilId);
            // Si no se pudo obtener el registro devolvemos un error
            if (!$profile) {
                return errorResponse('No hay perrfiles para mostrar');
            }
            // Se llama a la funcion encargada de setear las propiedades faltantes
            $this->setAttributesToProfile($profile);
            // Si se logro obtener el registro lo devolvemos en la respuesta
            return successResponse($profile);
        } catch (Exception $e) {
            $this->logger->error("GestionRepository -> findProfileById: {$e->getMessage()}");
            return errorResponse();
        }
    }

    private function setAttributesToProfile($profile)
    {
        // Se recorren todos los perfiles encontrados para setearle varios valores requeridos
        foreach($profile as $row):
            $users = $this->profileModel->getUsersByProfile($row->idperfil);
            $insur = $this->insurerPerfilModel->getInsurersByProfile($row->idperfil);
            // Se recorren los usuarios para setearlos al objeto Perfil
            $row->setUsers($users);
            // Se recorren las aseguradoras para setearlas al objeto Perfil
            $row->setInsurers($insur);
        endforeach;
    }

    public function update(Profile $profile, $id)
    {
        try {
            // LLenamos los campos de auditoria
            //$this->insertAuditData($user);
            // Realizamos la query
            $result = $this->profileModel->update($id, $profile);
            // Si no se pudo actualizar el registro devolvemos un error
            if (!$result) {
                return errorResponse('No se pudo actualizar el registro en: update');
            }
            // Si el registro se actualizo correctamente buscamos el perfil por su id
            $updateProfile = $this->profileModel->find($id);
            // Lo devolvemos en la respuesta
            return successResponse($updateProfile);
        } catch (Exception $e) {
            $this->logger->error("Error Catch en GestionRepository: update: " . $e->getMessage());
            return errorResponse();
        }
    }
}
