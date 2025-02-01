<?php

namespace Modules\Users\Infrastructure\Out\Persistence\Repository;

use Modules\Users\Infrastructure\Out\Persistence\Model\ModuleByProfileModel;
use Config\Services;
use Exception;

class ModuleByProfileRepository
{
    protected $moduleByProfileModel;

    public function __construct()
    {
        $this->moduleByProfileModel = new ModuleByProfileModel();
    }

    public function findModulesByProfile($profileId)
    {
        $logger = Services::logger();

        try {
            $sql = "SELECT m.* 
                    FROM modulo_perfil mp 
                    INNER JOIN modulos m ON m.idmodulo = mp.idmodulo 
                    WHERE mp.idperfil = :idPerfil: 
                    ORDER BY m.orden";

            $db = \Config\Database::connect();
            $query = $db->query($sql, ['idPerfil' => $profileId]);
            $result = $query->getResultArray();

            if ($result) {
                foreach ($result as &$modulo) {
                    $submodulosQuery = $db->query("select * from menu where idmodulo = ? order by idmenu", [$modulo['idmodulo']]);
                    $submodulos = $submodulosQuery->getResultArray();

                    $modulo['submodulos'] = $submodulos;
                }

                return successResponse($result, 'Datos encontrados.');
            } else {
                return errorResponse('No existen datos.');
            }

            return $result;
        } catch (Exception $e) {
            $logger->error("Error Catch en getModulosxPerfil: " + $e->getMessage());
            return errorResponse('Ocurrio un error al traer los modulos x perfil.');
        }
    }
}
