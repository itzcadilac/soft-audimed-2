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


    public function getAseguradoraxUser($idUser)
    {
        $logger = Services::logger();

        $sql = "SELECT a.*
                from usuario_aseguradora ua 
                inner join aseguradora a 
                on a.idaseguradora = ua.idaseguradora
                where ua.idusuario = :idUser:
                and ua.activo = :activo: 
                and ua.eliminado = :eliminado:
                and ua.estadoreg = :estadoreg: 
                ORDER BY 1";

        $query = $this->db->query($sql, [
                                    'idUser' => $idUser, 
                                    'activo' => 1,
                                    'eliminado' => 0,
                                    'estadoreg' => 0,
                                ]);

        $result = $query->getResultArray();

        return $result;

    }

    public function getProductsxAseg($idAseg,$idUser,$idPerfil)
    {
        $logger = Services::logger();

        $sql = "SELECT productos from usuario_aseguradora 
                where idusuario = :idUser: and activo = :activo: and eliminado = :eliminado: and estadoreg = :estadoreg: and idaseguradora = :idAseg:
                union
                select productos from perfil_aseguradora 
                where idperfil = :idPerfil: and eliminado = :eliminado: and estadoreg = :estadoreg: and idaseguradora = :idAseg:
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