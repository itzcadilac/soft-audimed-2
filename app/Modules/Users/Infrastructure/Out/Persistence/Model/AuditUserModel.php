<?php

namespace Modules\Users\Infrastructure\Out\Persistence\Model;

use CodeIgniter\Model;
use Modules\Users\Domain\AuditUser;

class AuditUserModel extends Model
{
    protected $table = 'auditoria';
    protected $primaryKey = 'idauditoria';
    protected $allowedFields = [
        'idauditoria', 
        'tipo', 
        'username', 
        'idusuario', 
        'remotehost', 
        'remotemachine', 
        'descripcion', 
        'contenido',
        'lat',
        'lon',
        'createdat'
    ];
    protected $returnType = \Modules\Users\Domain\AuditUser::class;

    /**
     * Metodo que permite obtener usuarios asociados a su perfil
     */
    
    public function getUserAuditory($userId = null)
    {
        // Definimos los campos a devolver y especificamos el join
        $query = $this->select([
            'auditoria.*'
        ]);

        if (!is_null($userId)) {
            $query->where("idusuario", $userId);
        }
        $result = $query->findAll();

        $auditusers = [];
        foreach ($result as $row) {
            // Volcamos la informacion de la tabla principal (usuarios) a la clase User
            $audituser = new AuditUser($row->toArray());

            $auditusers[] = $audituser;
        }

        return $auditusers;
    }

    public function getUserAuditoryLim($userId = null)
    {
        // Definimos los campos a devolver y especificamos el join
        $query = $this->select([
            'auditoria.*'
        ]);

        if (!is_null($userId)) {
            $query->where("idusuario", $userId);
        }
        $query->limit(5);
        $result = $query->findAll();

        $auditusersLim = [];
        foreach ($result as $row) {
            // Volcamos la informacion de la tabla principal (usuarios) a la clase User
            $audituserLim = new AuditUser($row->toArray());

            $auditusersLim[] = $audituserLim;
        }

        return $auditusersLim;
    }
}
