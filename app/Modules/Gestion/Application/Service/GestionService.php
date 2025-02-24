<?php

namespace Modules\Gestion\Application\Service;

use Config\Services;
use Modules\Gestion\Infrastructure\Out\Persistence\Repository\GestionRepository;
use Exception;
use Modules\Gestion\Domain\Profile;

class GestionService
{
    protected $gestionRepository;
    protected $logger;

    public function __construct(GestionRepository $gestionRepository)
    {
        $this->gestionRepository = $gestionRepository;
        $this->logger = Services::logger();

    }
	// Lista todos los perfiles
    public function getAllProfiles()
    {
        return $this->gestionRepository->findProfiles();
    }
    
    // Se obtiene el perfil por su id
    public function getProfileById($perfilId = null){
        return $this->gestionRepository->findProfileById($perfilId);
    }

}
