<?php

namespace App\Models\Repository;

use App\Models\ModuloPerfilModel;
use Config\Services;
use Exception;

class ModuloPerfilRepository
{
    protected $moduloPerfilModel;

    public function __construct()
    {
        $this->moduloPerfilModel = new ModuloPerfilModel();
    }

    public function getModulosxPerfil($idPerfil){

        $logger = Services::logger();

        try {
            // Obtener la conexión a la base de datos
            $db = \Config\Database::connect();

            // Usar placeholders con nombre
            //$sql = "SELECT * FROM producto WHERE idproducto = :id: AND categoria = :category:";

            $sql = "SELECT m.* 
                    FROM modulo_perfil mp 
                    INNER JOIN modulos m ON m.idmodulo = mp.idmodulo 
                    WHERE mp.idperfil = :idPerfil: 
                    ORDER BY m.orden";

            // Ejecutar la consulta pasando los parámetros con nombre
            $query = $db->query($sql, ['idPerfil' => $idPerfil]);

            // Obtener el resultado
            $result = $query->getResult();

            if ($result) {
                return successResponse($result, 'Datos encontrados.');
            }else{
                return errorResponse('No existen datos.');
            }

            return $result;
        } catch (Exception $e) {
            $logger->error("Error Catch en getModulosxPerfil: "+$e->getMessage());
            return errorResponse('Ocurrio un error al traer los modulos x perfil.');
        }
        
    }

}