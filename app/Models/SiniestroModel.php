<?php

namespace App\Models;

use CodeIgniter\Model;

class SiniestroModel extends Model
{
    protected $table = 'siniestros';
    protected $primaryKey = 'siniestroId';
    protected $allowedFields = [
        'siniestroId', 
        'aseguradoraId', 
        'tipoComunicacionId', 
        'fechaComunicacion', 
        'motivoRegistroId', 
        'notificante', 
        'parentesco', 
        'tipoDocumentoId', 
        'numeroDocumento', 
        'telefono', 
        'activacionServicioMedico', 
        'numeroSiniestro', 
        'tipoSiniestroId', 
        'fechaSiniestro', 
        'ubigeoSiniestro', 
        'tipoPolizaId', 
        'numeroPoliza', 
        'numeroPolizaSOAT', 
        'inicioVigenciaPoliza', 
        'finVigenciaPoliza', 
        'contratante', 
        'telefonoContratante', 
        'numeroPlaca', 
        'claseVehiculo', 
        'modeloVehiculo', 
        'marcarVehiculo', 
        'color', 
        'año', 
        'tipo', 
        'conductor', 
        'telefonoConductor', 
        'comisaria', 
        'numeroLesionados', 
        'observacion', 
        'nombreAsegurado', 
        'activo', 
        'CodigoServicioExterno', 
        'fechaSi24', 
        'fechallegadaMedico',
        'local',
        'tienda'
            ];
}
