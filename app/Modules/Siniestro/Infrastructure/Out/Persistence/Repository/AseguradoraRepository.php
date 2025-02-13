<?php
namespace Modules\Siniestro\Infrastructure\Out\Persistence\Repository;

use Config\Services;
use Exception;
use Modules\Siniestro\Infrastructure\Out\Persistence\Model\AseguradoraModel;

class AseguradoraRepository
{

    protected $aseguradoraModel;
    protected $db;

    public function __construct()
    {
        $this->aseguradoraModel = new AseguradoraModel();
        $this->db = \Config\Database::connect(); 
    }

    public function findById($id)
    {
        return $this->aseguradoraModel->find($id);
    }


    public function getAseguradoraxUser($idUser,$idPerfil)
    {
        $logger = Services::logger();

        $sql = "SELECT * from (
                select idaseguradora from usuario_aseguradora 
                    where idusuario = :idUser: and activo = :activo: 
                    and eliminado = :eliminado: and estadoreg = :estadoreg:
                union
                select idaseguradora from perfil_aseguradora 
                    where idperfil = :idPerfil: and eliminado = :eliminado: 
                    and estadoreg = :estadoreg:)ua
                inner join aseguradora a 
                on a.idaseguradora = ua.idaseguradora
                where a.activo = :activo:
                and eliminado = :eliminado:
                and estadoreg = :estadoreg:
                ORDER BY 1";

        $query = $this->db->query($sql, [
                                    'idUser' => $idUser, 
                                    'activo' => 1,
                                    'eliminado' => 0,
                                    'estadoreg' => 0,
                                    'idPerfil' => $idPerfil
                                ]);

        $result = $query->getResultArray();

        return $result;

    }

    public function getProductsxAseg($idAseg,$idUser,$idPerfil)
    {
        $logger = Services::logger();

        /*
        $sql = "SELECT productos from usuario_aseguradora 
                where idusuario = :idUser: and activo = :activo: and eliminado = :eliminado: and estadoreg = :estadoreg: and idaseguradora = :idAseg:
                union
                select productos from perfil_aseguradora 
                where idperfil = :idPerfil: and eliminado = :eliminado: and estadoreg = :estadoreg: and idaseguradora = :idAseg:
                ORDER BY 1";
        */

        $sql = "SELECT distinct p.*
                FROM (
                    SELECT productos 
                    FROM usuario_aseguradora 
                    WHERE idusuario = :idUser: AND activo = :activo: AND eliminado = :eliminado: AND estadoreg = :estadoreg: AND idaseguradora = :idAseg:
                    UNION
                    SELECT productos 
                    FROM perfil_aseguradora 
                    WHERE idperfil = :idPerfil: AND eliminado = :eliminado: AND estadoreg = :estadoreg: AND idaseguradora = :idAseg:
                ) AS tmp
                JOIN producto p ON FIND_IN_SET(p.codeproducto, tmp.productos)
                ORDER BY 1";

        $query = $this->db->query($sql, [
                                    'idAseg' => $idAseg, 
                                    'idUser' => $idUser,
                                    'idPerfil' => $idPerfil,
                                    'activo' => 1,
                                    'eliminado' => 0,
                                    'estadoreg' => 0
                                ]);

        $result = $query->getResultArray();

        return $result;
    }

}