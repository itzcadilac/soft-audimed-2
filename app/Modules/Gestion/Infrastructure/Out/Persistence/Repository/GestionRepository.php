<?php

namespace Modules\Gestion\Infrastructure\Out\Persistence\Repository;

use Modules\Gestion\Infrastructure\Out\Persistence\Model\ProfileModel;
use Modules\Gestion\Infrastructure\Out\Persistence\Model\InsurerUserModel;
use Modules\Gestion\Domain\Profile;
use Modules\Gestion\Domain\InsurerUser;
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
        $this->insurerUserModel = new InsurerUserModel();
        $this->logger = Services::logger();
    }

    public function findProfiles()
    {
        try {
            // Realizamos la query
            $result = $this->profileModel->findAll();
            // Si no se pudo obtener el registro devolvemos un error
            if (!$result) {
                return errorResponse('No hay perfiles para mostrar');
            }
            // Si se logro obtener el registro lo devolvemos en la respuesta
            return successResponse($result);
        } catch (Exception $e) {
            $this->logger->error("GestionRepository -> findProfiles: {$e->getMessage()}");
            return errorResponse();
        }
    }

    public function findInsurerByUser($idUser = null)
    {
        try {
            // Realizamos la query
            $result = $this->insurerUserModel->findInsurerByUser($idUser);
            // Si no se pudo obtener el registro devolvemos un error
            if (!$result) {
                return errorResponse('No hay aseguradoras para mostrar');
            }
            // Si se logro obtener el registro lo devolvemos en la respuesta
            return successResponse($result);
        } catch (Exception $e) {
            $this->logger->error("GestionRepository -> findByUser: {$e->getMessage()}");
            return errorResponse();
        }
    }

}
