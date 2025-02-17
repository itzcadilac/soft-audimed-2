<?php

namespace Modules\Users\Infrastructure\Out\Persistence\Model;

use CodeIgniter\Model;
use Modules\Users\Domain\User;
use Modules\Users\Domain\MovUser;

class UserModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'idusuario';
    protected $allowedFields = [
        'idusuario',
        'idtipodocumento',
        'numero_documento',
        'avatar',
        'apellidos',
        'nombres',
        'usuario',
        'passwd',
        'idperfil',
        'activo',
        'retry',
        'fretry',
        'eliminado',
        'estadoreg',
        'email',
        'movil',
        'idle_sesion',
        'fconfirm',
        'flastpwd',
        'flastmov',
        'flastaccess',
        'confirmado',
        'createdat',
        'updatedat',
        'createdby',
        'updatedby',
        'retry',
        'fretry'
    ];
    protected $returnType = \Modules\Users\Domain\User::class;

    /**
     * Metodo que permite obtener usuarios asociados a su perfil
     */
    public function getUserWithProfile($userId = null)
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
    }

    public function getUserMovements($userId = null)
    {
        // Definimos los campos a devolver y especificamos el join
        $query = $this->select([
            'movimientos.*'
        ]);

        if (!is_null($userId)) {
            $query->where("idusuario", $userId);
        }
        $result = $query->findAll();

        $movusers = [];
        foreach ($result as $row) {
            // Volcamos la informacion de la tabla principal (usuarios) a la clase User
            $movuser = new MovUser($row->toArray());

            $movusers[] = $movuser;
        }

        return $movusers;
    }

    public function getCountProfileUser($idPerfil = null)
    {
        $result = $this->distinct()->select('idusuario')->asArray()->where(['idperfil' => $idPerfil])->get();
        return $result;
    }
}
