<?php

namespace Modules\Users\Application\Service;

use Modules\Users\Infrastructure\Out\Persistence\Repository\ProfileRepository;
use Exception;

class ProfileService
{
    protected $profileRepository;
    protected $session;

    public function __construct(ProfileRepository $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    public function getListActiveProfile(){
        try {
            return $this->profileRepository->findProfilesByStatus(ACTIVE_VALUE);
        } catch (Exception $e) {
            return errorResponse('Ocurrio un error al traer los datos');
        }
    }
}
