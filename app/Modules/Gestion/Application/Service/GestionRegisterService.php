<?php

namespace Modules\Gestion\Application\Service;

use Modules\Gestion\Domain\Profile;
use Modules\Gestion\Infrastructure\Out\Persistence\Repository\GestionRepository;
use Modules\Common\Audit\Enum\AuditTypeEnum;
use Config\Services;
use Exception;
use DateTime;

class GestionRegisterService
{
    protected $gestionRepository;
    protected $logger;

    public function __construct(GestionRepository $gestionRepository)
    {
        $this->gestionRepository = $gestionRepository;
        $this->logger = Services::logger();
    }

    public function updateProfile(Profile $profile, $id, $profileOld)
    {
        try {
            // Actualiza el usuario
            $updateProfile = $this->gestionRepository->update($profile, $id);
            if (!$updateProfile["success"]) {
                return errorResponse($updateProfile["message"]);
            }
            // Se guardan los datos del registro en auditoria
            auditEventTrigger(AuditTypeEnum::TYPE_UPDATE, "Actualización de perfil <{$profileOld}>", $updateProfile["data"]);
            
            return successResponse($updateProfile);
        } catch (Exception $e) {
            $this->logger->error("GestionRegisterService -> updateProfile: {$e->getMessage()}");
            return errorResponse($e->getMessage());
        }
    }

    public function profileActivate(Profile $profile, $id, $profileName)
    {
        try {
            // Actualiza el usuario
            $updateProfile = $this->gestionRepository->update($profile, $id);
            if (!$updateProfile["success"]) {
                return errorResponse($updateProfile["message"]);
            }
            
            // Se guardan los datos del registro en auditoria
            $enum = ''; $title = '';
            if($profile->activo === 1){ $enum = AuditTypeEnum::TYPE_ACTIVATE; $title = 'Activación del perfil '; }
            else{ $enum = AuditTypeEnum::TYPE_DEACTIVATE; $title = 'Desactivación del perfil '; }
            
            auditEventTrigger($enum, "$title<{$profileName}>", $updateProfile["data"]);
            
            return successResponse($updateProfile);
        } catch (Exception $e) {
            $this->logger->error("GestionRegisterService -> profileActivate: {$e->getMessage()}");
            return errorResponse($e->getMessage());
        }
    }

    public function profileBloq(Profile $profile, $id, $profileName)
    {
        try {
            // Actualiza el usuario
            $updateProfile = $this->gestionRepository->update($profile, $id);
            if (!$updateProfile["success"]) {
                return errorResponse($updateProfile["message"]);
            }
            // Se guardan los datos del registro en auditoria            
            auditEventTrigger(AuditTypeEnum::TYPE_UPDATE, "Estado de Perfil <{$profileName}>", $updateProfile["data"]);
            
            return successResponse($updateProfile);
        } catch (Exception $e) {
            $this->logger->error("GestionRegisterService -> profileBloq: {$e->getMessage()}");
            return errorResponse($e->getMessage());
        }
    }

    public function profileDel(Profile $profile, $id, $profileName)
    {
        try {
            // Actualiza el usuario
            $updateProfile = $this->gestionRepository->update($profile, $id);
            if (!$updateProfile["success"]) {
                return errorResponse($updateProfile["message"]);
            }
            // Se guardan los datos del registro en auditoria            
            auditEventTrigger(AuditTypeEnum::TYPE_DELETE, "Eliminación del Perfil <{$profileName}>", $updateProfile["data"]);
            
            return successResponse($updateProfile);
        } catch (Exception $e) {
            $this->logger->error("GestionRegisterService -> profileDel: {$e->getMessage()}");
            return errorResponse($e->getMessage());
        }
    }
}
