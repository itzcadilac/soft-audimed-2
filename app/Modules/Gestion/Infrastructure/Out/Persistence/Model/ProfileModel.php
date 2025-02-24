<?php

namespace Modules\Gestion\Infrastructure\Out\Persistence\Model;

use CodeIgniter\Model;
use Modules\Gestion\Domain\Profile;

class ProfileModel extends Model
{
    protected $table = 'perfil';
    protected $primaryKey = 'idperfil';
    protected $allowedFields = [
        'idperfil',
        'perfil',
        'activo',
        'eliminado',
        'estadoreg',
        'createat',
        'updateat',
        'createdby',
        'updatedby'
    ];
    protected $returnType = \Modules\Gestion\Domain\Profile::class;

    // Metodo para obtener el perfil por Id
    public function findProfileById($perfilId = null)
    {
        $query = $this->select()->where(['idperfil' => $perfilId])->findAll();
        //return new Profile((array)$query->getRow());
        return $query;
    }

    public function getUsersByProfile($perfilId = null)
    {
        $result = $this->select(['u.*'])->join('usuarios u','perfil.idperfil=u.idperfil','right')->where('perfil.idperfil', $perfilId)->findAll();
        return $result;
    }
}
