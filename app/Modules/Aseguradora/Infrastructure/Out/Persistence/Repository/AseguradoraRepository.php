<?php

namespace Modules\Aseguradora\Infrastructure\Out\Persistence\Repository;

use Config\Services;
use Exception;
use Modules\Aseguradora\Domain\Aseguradora;
use Modules\Aseguradora\Infrastructure\Out\Persistence\Model\AseguradoraModel;

class AseguradoraRepository
{
    protected $aseguradoraModel;
    protected $profileModel;

    public function __construct()
    {
        $this->aseguradoraModel = new AseguradoraModel();
    }

    public function getAseguradoraxUser($idUser)
    {
        $logger = Services::logger();

        try {
            // Obtener la conexión a la base de datos
            $db = \Config\Database::connect();

            $sql = "SELECT a.* 
                    FROM usuarios u 
                    INNER JOIN usuario_aseguradora ua ON ua.idusuario = u.idusuario
                    INNER JOIN aseguradora a ON a.idaseguradora = ua.idaseguradora
                    WHERE u.idusuario = :idUser:
                    AND ua.estado = :idEstado:
                    ORDER BY 1";

            // Ejecutar la consulta pasando los parámetros con nombre
            $query = $db->query($sql, ['idUser' => $idUser, 'idEstado' => 1 ]);

            // Obtener el resultado
            $result = $query->getResultArray();
            //getResult

            if ($result) {
                return successResponse($result, 'Datos encontrados.');
            }else{
                return errorResponse('No existen datos.');
            }

        } catch (Exception $e) {
            $logger->error("Error Catch en getAseguradoraxUser: "+$e->getMessage());
            return errorResponse('Ocurrio un error al traer las aseguradoras por Usuario.');
        }

    }

    public function getProductsxAseg($idAseg)
    {
        $logger = Services::logger();

        try {
            // Obtener la conexión a la base de datos
            $db = \Config\Database::connect();

            $sql = "SELECT p.* from aseguradora_producto ap 
                    inner join producto p
                    on p.idproducto = ap.idproducto
                    where ap.idaseguradora = :idAseg:
                    and ap.activo = :idActivo:
                    ORDER BY 1";

            // Ejecutar la consulta pasando los parámetros con nombre
            $query = $db->query($sql, ['idAseg' => $idAseg, 'idActivo' => 1 ]);

            // Obtener el resultado
            $result = $query->getResultArray();
            //getResult

            if ($result) {
                return successResponse($result, 'Datos encontrados.');
            }else{
                return errorResponse('No existen datos.');
            }

        } catch (Exception $e) {
            $logger->error("Error Catch en getProductsxAseg: "+$e->getMessage());
            return errorResponse('Ocurrio un error al traer productos x aseguradora.');
        }

    }
}