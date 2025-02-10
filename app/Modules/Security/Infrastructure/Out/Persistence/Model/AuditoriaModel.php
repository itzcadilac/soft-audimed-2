<?php
namespace Modules\Security\Infrastructure\Out\Persistence\Model;

use CodeIgniter\Model;

class AuditoriaModel extends Model
{
    protected $table = 'auditoria';
    protected $primaryKey = 'idauditoria';
    protected $allowedFields = ['tipo', 'username', 'idusuario', 'remotehost', 'remotemachine', 'descripcion', 'contenido', 'lat', 'lon'];
    protected $returnType = \Modules\Security\Domain\Auditoria::class;
}