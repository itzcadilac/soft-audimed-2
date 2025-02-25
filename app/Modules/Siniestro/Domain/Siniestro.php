<?php
namespace Modules\Siniestro\Domain;
//namespace Modules\Accidentado\Domain;

use CodeIgniter\Entity\Entity;

class Siniestro extends Entity
{
   
    protected $attributes = [
        'siniestroId' => null,
        'aseguradoraId' => null,
        'tipoComunicacionId' => null,
        'fechaComunicacion' => null,
        'motivoRegistroId' => null,
        'notificante' => null,
        'parentesco' => null,
        'tipoDocumentoId' => null,
        'numeroDocumento' => null,
        'telefono' => null,
        'activacionServicioMedico' => null,
        'numeroSiniestro' => null,
        'tipoSiniestroId' => null,
        'fechaSiniestro' => null,
        'ubigeoSiniestro' => null,
        'tipoPolizaId' => null,
        'numeroPoliza' => null,
        'numeroPolizaSOAT' => null,
        'inicioVigenciaPoliza' => null,
        'finVigenciaPoliza' => null,
        'contratante' => null,
        'telefonoContratante' => null,
        'numeroPlaca' => null,
        'claseVehiculo' => null,
        'modeloVehiculo' => null,
        'marcarVehiculo' => null,
        'color' => null,
        'año' => null,
        'tipo' => null,
        'conductor' => null,
        'telefonoConductor' => null,
        'comisaria' => null,
        'numeroLesionados' => null,
        'observacion' => null,
        'nombreAsegurado' => null,
        'activo' => null,
        'CodigoServicioExterno' => null,
        'fechaSi24' => null,
        'fechallegadaMedico' => null,
        'local' => null,
        'tienda' => null,
        'eliminado' => null,
        'estadoreg' => null,
        'createdat' => null,
        'updatedat' => null,
        'createdby' => null,
        'updatedby' => null,
        'accidentado' => null
    ];
    protected $casts = [
        'accidentado' => 'object'
    ];

    public function setAccidentado(array $data)
    {
        $this->attributes['accidentado'] = new Siniestro($data);
    }
}