<?php

namespace Modules\Users\Infrastructure\Out\Persistence\Model;

use CodeIgniter\Model;

class StatusRegModel extends Model
{
    protected $table = 'parametros';
    protected $primaryKey = 'idparametro';
    protected $allowedFields = [
        'idparametro',
        'tipo',
        'codigo',
        'valor',
        'activo',
        'eliminado',
        'estadoreg',
        'createdat',
        'updatedat',
        'createdby',
        'updatedby'        
    ];
    protected $returnType = \Modules\Users\Domain\Parameters::class;
}
