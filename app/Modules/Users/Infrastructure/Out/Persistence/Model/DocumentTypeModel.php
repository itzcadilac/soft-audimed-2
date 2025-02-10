<?php

namespace Modules\Users\Infrastructure\Out\Persistence\Model;

use CodeIgniter\Model;

class DocumentTypeModel extends Model{
    protected $table = 'tipo_documento';
    protected $primaryKey = 'idtipodocumento';
    protected $allowedFields = ['idtipodocumento', 'codigo_curl', 'codigo_sunat', 'tipo_documento', 'longitud', 'activo'];
    protected $returnType = \Modules\Users\Domain\DocumentType::class;
}