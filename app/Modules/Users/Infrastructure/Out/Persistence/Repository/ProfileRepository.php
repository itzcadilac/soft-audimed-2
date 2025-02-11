<?php

namespace Modules\Users\Infrastructure\Out\Persistence\Repository;

use Modules\Users\Infrastructure\Out\Persistence\Model\ProfileModel;
use Config\Services;
use Exception;

class ProfileRepository
{
    protected $profileModel;
    protected $logger;

    public function __construct()
    {
        $this->profileModel = new ProfileModel();
        $this->logger = Services::logger();
    }

    public function findProfilesByStatus($isActive)
    {
        try {
            $result = $this->profileModel->where('activo', $isActive)->findAll();

            if ($result) {
                return successResponse($result, 'Perfiles encontrados.');
            }
            return errorResponse('No hay perfiles registrados.');
        } catch (Exception $e) {
            $this->logger->error("Error Catch en ProfileRepository -> getAllActiveProfiles -> " + $e->getMessage());
            return errorResponse('Perfiles no encontrados.');
        }
    }
}
