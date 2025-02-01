<?php

namespace Modules\Users\Infrastructure\Out\Persistence\Repository;

use Modules\Users\Infrastructure\Out\Persistence\Model\ProfileModel;
use CodeIgniter\Config\Services;
use Exception;

class ProfileRepository
{
    protected $profileModel;

    public function __construct()
    {
        $this->profileModel = new ProfileModel();
    }

    public function findProfilesByStatus($isActive)
    {
        $logger = Services::logger();

        try {
            $result = $this->profileModel->where('activo', $isActive)->findAll();

            if ($result) {
                return successResponse($result, 'Perfiles encontrados.');
            }
            return errorResponse('No hay perfiles registrados.');
        } catch (Exception $e) {
            $logger->error("Error Catch en ProfileRepository -> getAllActiveProfiles -> " + $e->getMessage());
            return errorResponse('Perfiles no encontrados.');
        }
    }
}
