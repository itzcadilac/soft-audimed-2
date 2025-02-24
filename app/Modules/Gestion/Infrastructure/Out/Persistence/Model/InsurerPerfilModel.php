<?php

namespace Modules\Gestion\Infrastructure\Out\Persistence\Model;

use CodeIgniter\Model;

class InsurerPerfilModel extends Model
{
    protected $table = 'perfil_aseguradora';
    protected $primaryKey = 'idperfilaseguradora';
    protected $allowedFields = [
        'idperfilaseguradora',
        'idaseguradora',
        'idperfil',
        'productos',
        'eliminado',
        'estadoreg',
        'createdat',
        'updatedat',
        'createdby',
        'updatedby'
    ];
    protected $returnType = \Modules\Gestion\Domain\InsurerPerfil::class;

    public function getInsurersByProfile($perfilId = null)
    {
        $result = $this->select(['perfil_aseguradora.*','a.*'])
                ->join('perfil p','p.idperfil=perfil_aseguradora.idperfil','left')
                ->join('aseguradora a','perfil_aseguradora.idaseguradora=a.idaseguradora','both')
                ->where('p.idperfil', $perfilId)->findAll();
        return $result;
    }
}
