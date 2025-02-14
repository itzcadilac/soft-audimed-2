<?php

namespace Modules\Users\Infrastructure\Out\Persistence\Model;

use CodeIgniter\Model;
use Modules\Users\Domain\MovUser;

class MovUserModel extends Model
{
    protected $table = 'movimientos';
    protected $primaryKey = 'idmovimiento';
    protected $allowedFields = [
        'idmovimiento', 
        'modulo', 
        'tipo', 
        'descripcion', 
        'contenido', 
        'username', 
        'idusuario', 
        'createdat'
    ];
    protected $returnType = \Modules\Users\Domain\MovUser::class;

    /**
     * Metodo que permite obtener usuarios asociados a su perfil
     */
    
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
}
