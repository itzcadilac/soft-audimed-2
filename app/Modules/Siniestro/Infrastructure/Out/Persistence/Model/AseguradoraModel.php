<?php
namespace Modules\Siniestro\Infrastructure\Out\Persistence\Model;

use CodeIgniter\Model;

class AseguradoraModel extends Model
{

    protected $table = 'aseguradora';
    protected $primaryKey = 'idaseguradora';
    protected $allowedFields = [
        'codigo_iafa', 'numero_ruc', 'razon_social', 'nombre_comercial', 'domicilio', 'ubigeo', 'latitud', 'longitud', 'celular', 'contacto', 'correo', 'observaciones', 'activo'
    ];
    protected $returnType = \Modules\Siniestro\Domain\Aseguradora::class;

}