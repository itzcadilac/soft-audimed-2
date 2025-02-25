<?php

namespace Modules\Accidentado\Domain;

use CodeIgniter\Entity\Entity;

class Accidentado extends Entity
{
    protected $attributes = [
        'accidentadoId'=> null,
        'siniestroId'=> null,
        'auditorId'=> null,
        'tipoAtencionId'=> null,
        'posicionAccidentadoId'=> null,
        'telefonoReferencia'=> null,
        'nombreAccidentado'=> null,
        'sexoAccidentadoId'=> null,
        'edadAccidentado'=> null,
        'tipoEdadAccidentadoId'=> null,
        'direccionAccidentado'=> null,
        'telefonoReferenciaAccidentado'=> null,
        'tipoDocumentoAccidentadoId'=> null,
        'documentoAccidentado'=> null,
        'centroLaboralAccidentado'=> null,
        'numeroHistoriaClinicaAccidentado'=> null,
        'antecedentesPatologicosAccidentado'=> null,
        'fechaIngresoLesionado'=> null,
        'centroMedicoIdAtencionInicial'=> null,
        'nombreEmergencistaAtencionInicial'=> null,
        'numeroColegioMedicoAtencionInicial'=> null,
        'trasladadoPorIdAtencionInicial'=> null,
        'examenEspecificoAtencionInicial'=> null,
        'tratamientoEspecificoAtencionInicial'=> null,
        'examenRealizadoIdAtencionInicial'=> null,
        'tipoAltaMedicaIdAltaMedica'=> null,
        'fechaAltaMedica'=> null,
        'medicoTratanteAltaMedica'=> null,
        'numeroColegioMedicoAltaMedica'=> null,
        'estadoAccidentadoIdDiagnostico'=> null,
        'tipoInvalidezIdInvalidez'=> null,
        'descripcionCausaInvalidez'=> null,
        'medicoTratante'=> null,
        'numeroColegioMedicoInvalidez'=> null,
        'opinionMedicoAuditorInvalidez'=> null,
        'gradoInvalidezIdInvalidez'=> null,
        'comentarioInvalidez'=> null,
        'fechaHoraMuerte'=> null,
        'centroMedicoIdMuerte'=> null,
        'medicoTratanteMuerte'=> null,
        'numeroColegioMedicoMuerte'=> null,
        'causaCIEIdMuerte'=> null,
        'causaEspecificaMuerte'=> null,
        'numeroNecropsiaMuerte'=> null,
        'fechaNecropsiaMuerte'=> null,
        'funerariaMuerte'=> null,
        'cementerioMuerte'=> null,
        'prioridadCasoIdComentario'=> null,
        'comentariosComentario'=> null,
        'conceptoAhorroSegusComentario'=> null,
        'montoAhorroEstimadoComentario'=> null,
        'reservagastoMedico'=> null,
        'reservaDiscapacidad'=> null,
        'reservaInvalidez'=> null,
        'reservaGastoMuerte'=> null,
        'reservaSepelio'=> null,
        'trasladadoDeIdAtencionInicial'=> null,
        'fechaDatosGenerales'=> null,
        'fechaSegundaVisitaAlta'=> null,
        'fechaTerceraVisitaAlta' => null,
        'activo'=> null,
        'ubigeoAccidentado'=> null,
        'enviado'=> null,
        'topeMaximoGastoMedico'=> null,
        'topeMaximoInvalidez'=> null,
        'topeMaximoIncapacidad'=> null,
        'topeMaximoMuerte'=> null,
        'topeMaximoSepelio'=> null,
        'primerNombreAccidentado'=> null,
        'segungoNombreAccidentado'=> null,
        'apellidoPaternoAccidentado'=> null,
        'apellidoMaternoAccidentado'=> null,
        'uit'=> null,
        'reservaDiscapacidadDias'=> null,
        'pdf'=> null,
        'cerrado'=> null,
        'numeroAccidentadoCorrelativo'=> null,
        'fechaCierre'=> null,
        'comentarioCierre'=> null,
        'tipoCierreId'=> null,
        'reservaInvalidezPorcentaje'=> null
    ];

    protected $casts = [
        'accidentado' => 'object'
    ];

    public function getFullName()
    {
        return $this->attributes["nombres"] . " " . $this->attributes["apellidos"];
    }

    public function setAccidentado(array $data)
    {
        $this->attributes['accidentado'] = new Accidentado($data);
    }
}
