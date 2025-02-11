<?php
namespace Modules\Siniestro\Infrastructure\Out\Persistence\Model;

use CodeIgniter\Model;

class SiniestroModel extends Model
{
    protected $table = 'siniestros';
    protected $primaryKey = 'siniestroId';
    protected $allowedFields = ['campos'];
    protected $returnType = \Modules\Siniestro\Domain\Siniestro::class;
}