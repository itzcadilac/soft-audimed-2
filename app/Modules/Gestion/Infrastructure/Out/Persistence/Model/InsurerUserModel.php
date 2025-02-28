<?php

namespace Modules\Gestion\Infrastructure\Out\Persistence\Model;

use CodeIgniter\Model;

class InsurerUserModel extends Model
{
    protected $table = 'usuario_aseguradora';
    protected $primaryKey = 'idusuarioaseguradora';
    protected $allowedFields = [
        'idusuarioaseguradora',
        'idaseguradora',
        'idusuario',
        'productos',
        'activo',
        'eliminado',
        'estadoreg',
        'createdat',
        'updatedat',
        'createdby',
        'updatedby'
    ];
    protected $returnType = \Modules\Gestion\Domain\InsurerUser::class;

    public function findInsurerByUser($idUser = null)
    {
        $result = $this->select('productos')->asArray()->where(['idusuario' => $idUser])->get();
        return $result;
    }
    /**
     * Metodo que permite obtener usuarios asociados a su perfil
     */
    /*public function getUserWithProfile($userId = null)
    {
        // Definimos los campos a devolver y especificamos el join
        $query = $this->select([
            'usuarios.*',
            'perfil.idperfil AS perfil_idperfil',
            'perfil.perfil AS perfil_perfil',
            'perfil.activo AS perfil_activo',
            'perfil.eliminado AS perfil_eliminado',
            'perfil.estadoreg AS perfil_estadoreg',
            'perfil.createdat AS perfil_createdat',
            'perfil.updatedat AS perfil_updatedat',
            'perfil.createdby AS perfil_createdby',
            'perfil.updatedby AS perfil_updatedby'
        ])
            ->join('perfil', 'perfil.idperfil = usuarios.idperfil', 'left');

        if (!is_null($userId)) {
            $query->where("idusuario", $userId);
        }
        $result = $query->findAll();

        $users = [];
        foreach ($result as $row) {
            // Volcamos la informacion de la tabla principal (usuarios) a la clase User
            $user = new User($row->toArray());
            // Obtenemos los campos del resultado y lo mapeamos al perfil
            $user->setPerfil([
                "idperfil" => $row->perfil_idperfil,
                "perfil" => $row->perfil_perfil,
                "activo" => $row->perfil_activo,
                "eliminado" => $row->perfil_eliminado,
                "estadoreg" => $row->perfil_estadoreg,
                "createdat" => $row->perfil_createdat,
                "updatedat" => $row->perfil_updatedat,
                "createdby" => $row->perfil_createdby,
                "updatedby" => $row->perfil_updatedby
            ]);

            $users[] = $user;
        }

        return $users;
    }*/
}
