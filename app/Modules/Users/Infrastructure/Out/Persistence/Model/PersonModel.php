<?php

namespace Modules\Users\Infrastructure\Out\Persistence\Model;

use CodeIgniter\Model;

class PersonModel extends Model
{
    protected $table = 'personas';
    protected $primaryKey = 'idepersona';
    protected $allowedFields = [
        "idepersona",
        "tipdocumento",
        "documento",
        "nombres",
        "ape_paterno",
        "ape_materno",
        "estado",
        "fecregistro"
    ];
    protected $returnType = \Modules\Users\Domain\Person::class;
}
