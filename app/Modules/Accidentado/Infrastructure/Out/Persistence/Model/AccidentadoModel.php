<?php

namespace Modules\Accidentado\Infrastructure\Out\Persistence\Model;

use CodeIgniter\Model;
use Modules\Accidentado\Domain\Accidentado;
use Modules\Siniestro\Domain\Siniestro;
use Modules\Users\Domain\MovUser;

class AccidentadoModel extends Model
{
    protected $table = 'accidentado';
    protected $primaryKey = 'accidentadoId';
    protected $allowedFields = [
    'accidentadoId',
    'siniestroId',
    'auditorId',
    'tipoAtencionId',
    'posicionAccidentadoId',
    'telefonoReferencia',
    'nombreAccidentado',
    'sexoAccidentadoId',
    'edadAccidentado',
    'tipoEdadAccidentadoId',
    'direccionAccidentado',
    'telefonoReferenciaAccidentado',
    'tipoDocumentoAccidentadoId',
    'documentoAccidentado',
    'centroLaboralAccidentado',
    'numeroHistoriaClinicaAccidentado',
    'antecedentesPatologicosAccidentado',
    'fechaIngresoLesionado',
    'centroMedicoIdAtencionInicial',
    'nombreEmergencistaAtencionInicial',
    'numeroColegioMedicoAtencionInicial',
    'trasladadoPorIdAtencionInicial',
    'examenEspecificoAtencionInicial',
    'tratamientoEspecificoAtencionInicial',
    'examenRealizadoIdAtencionInicial',
    'tipoAltaMedicaIdAltaMedica',
    'fechaAltaMedica',
    'medicoTratanteAltaMedica',
    'numeroColegioMedicoAltaMedica',
    'estadoAccidentadoIdDiagnostico',
    'tipoInvalidezIdInvalidez',
    'descripcionCausaInvalidez',
    'medicoTratante',
    'numeroColegioMedicoInvalidez',
    'opinionMedicoAuditorInvalidez',
    'gradoInvalidezIdInvalidez',
    'comentarioInvalidez',
    'fechaHoraMuerte',
    'centroMedicoIdMuerte',
    'medicoTratanteMuerte',
    'numeroColegioMedicoMuerte',
    'causaCIEIdMuerte',
    'causaEspecificaMuerte',
    'numeroNecropsiaMuerte',
    'fechaNecropsiaMuerte',
    'funerariaMuerte',
    'cementerioMuerte',
    'prioridadCasoIdComentario',
    'comentariosComentario',
    'conceptoAhorroSegusComentario',
    'montoAhorroEstimadoComentario',
    'reservagastoMedico',
    'reservaDiscapacidad',
    'reservaInvalidez',
    'reservaGastoMuerte',
    'reservaSepelio',
    'trasladadoDeIdAtencionInicial',
    'fechaDatosGenerales',
    'fechaSegundaVisitaAlta',
    'fechaTerceraVisitaAlta',
    'activo',
    'ubigeoAccidentado',
    'enviado',
    'topeMaximoGastoMedico',
    'topeMaximoInvalidez',
    'topeMaximoIncapacidad',
    'topeMaximoMuerte',
    'topeMaximoSepelio',
    'primerNombreAccidentado',
    'segungoNombreAccidentado',
    'apellidoPaternoAccidentado',
    'apellidoMaternoAccidentado',
    'uit',
    'reservaDiscapacidadDias',
    'pdf',
    'cerrado',
    'numeroAccidentadoCorrelativo',
    'fechaCierre',
    'comentarioCierre',
    'tipoCierreId',
    'reservaInvalidezPorcentaje'
    ];
    protected $returnType = \Modules\Accidentado\Domain\Accidentado::class;

    /**
     * Metodo que permite obtener usuarios asociados a su perfil
     */
    public function getAccidentadosXSiniestro($siniestroId = null)
    {
        // Definimos los campos a devolver y especificamos el join
        $query = $this->select([
            'accidentado.*',
            'siniestros.siniestroId AS siniestros_siniestroId',
            'siniestros.aseguradoraId AS siniestros_aseguradoraId',
            'siniestros.tipoComunicacionId AS siniestros_tipoComunicacionId',
            'siniestros.fechaComunicacion AS siniestros_fechaComunicacion',
            'siniestros.motivoRegistroId AS siniestros_motivoRegistroId',
            'siniestros.notificante AS siniestros_notificante',
            'siniestros.parentesco AS siniestros_parentesco',
            'siniestros.tipoDocumentoId AS siniestros_tipoDocumentoId',
            'siniestros.numeroDocumento AS siniestros_numeroDocumento',
            'siniestros.telefono AS siniestros_telefono',
            'siniestros.activacionServicioMedico AS siniestros_activacionServicioMedico',
            'siniestros.numeroSiniestro AS siniestros_numeroSiniestro',
            'siniestros.tipoSiniestroId AS siniestros_tipoSiniestroId',
            'siniestros.fechaSiniestro AS siniestros_fechaSiniestro',
            'siniestros.ubigeoSiniestro AS siniestros_ubigeoSiniestro',
            'siniestros.tipoPolizaId AS siniestros_tipoPolizaId',
            'siniestros.numeroPoliza AS siniestros_numeroPoliza',
            'siniestros.numeroPolizaSOAT AS siniestros_numeroPolizaSOAT',
            'siniestros.inicioVigenciaPoliza AS siniestros_inicioVigenciaPoliza',
            'siniestros.finVigenciaPoliza AS siniestros_finVigenciaPoliza',
            'siniestros.contratante AS siniestros_contratante',
            'siniestros.telefonoContratante AS siniestros_telefonoContratante',
            'siniestros.numeroPlaca AS siniestros_numeroPlaca',
            'siniestros.claseVehiculo AS siniestros_claseVehiculo',
            'siniestros.modeloVehiculo AS siniestros_modeloVehiculo',
            'siniestros.marcarVehiculo AS siniestros_marcarVehiculo',
            'siniestros.color AS siniestros_color',
            'siniestros.año AS siniestros_año',
            'siniestros.tipo AS siniestros_tipo',
            'siniestros.conductor AS siniestros_conductor',
            'siniestros.telefonoConductor AS siniestros_telefonoConductor',
            'siniestros.comisaria AS siniestros_comisaria',
            'siniestros.numeroLesionados AS siniestros_numeroLesionados',
            'siniestros.observacion AS siniestros_observacion',
            'siniestros.nombreAsegurado AS siniestros_nombreAsegurado',
            'siniestros.activo AS siniestros_activo',
            'siniestros.CodigoServicioExterno AS siniestros_CodigoServicioExterno',
            'siniestros.fechaSi24 AS siniestros_fechaSi24',
            'siniestros.fechallegadaMedico AS siniestros_fechallegadaMedico',
            'siniestros.local AS siniestros_local',
            'siniestros.tienda AS siniestros_tienda',
            'siniestros.eliminado AS siniestros_eliminado',
            'siniestros.estadoreg AS siniestros_estadoreg',
            'siniestros.createdat AS siniestros_createdat',
            'siniestros.updatedat AS siniestros_updatedat',
            'siniestros.createdby AS siniestros_createdby',
            'siniestros.updatedby AS siniestros_updatedby' 
        ])
            ->join('siniestros', 'siniestros.siniestroId = accidentado.siniestroId', 'right');

        if (!is_null($siniestroId)) {
            $query->where("siniestros.siniestroId", $siniestroId);
        }
        $result = $query->findAll();

        $accidentados = [];
        foreach ($result as $row) {
            // Volcamos la informacion de la tabla principal (usuarios) a la clase User
            $siniestro = new Siniestro($row->toArray());
            // Obtenemos los campos del resultado y lo mapeamos al perfil
            $siniestro->setAccidentado([
            "accidentadoId" => $row->accidentadoId,
            "siniestroId" => $row->siniestroId,
            "auditorId" => $row->auditorId,
            "tipoAtencionId" => $row->tipoAtencionId,
            "posicionAccidentadoId" => $row->posicionAccidentadoId,
            "telefonoReferencia" => $row->telefonoReferencia,
            "nombreAccidentado" => $row->nombreAccidentado,
            "sexoAccidentadoId" => $row->sexoAccidentadoId,
            "edadAccidentado" => $row->edadAccidentado,
            "tipoEdadAccidentadoId" => $row->tipoEdadAccidentadoId,
            "direccionAccidentado" => $row->direccionAccidentado,
            "telefonoReferenciaAccidentado" => $row->telefonoReferenciaAccidentado,
            "tipoDocumentoAccidentadoId" => $row->tipoDocumentoAccidentadoId,
            "documentoAccidentado" => $row->documentoAccidentado,
            "centroLaboralAccidentado" => $row->centroLaboralAccidentado,
            "numeroHistoriaClinicaAccidentado" => $row->numeroHistoriaClinicaAccidentado,
            "antecedentesPatologicosAccidentado" => $row->antecedentesPatologicosAccidentado,
            "fechaIngresoLesionado" => $row->fechaIngresoLesionado,
            "centroMedicoIdAtencionInicial" => $row->centroMedicoIdAtencionInicial,
            "nombreEmergencistaAtencionInicial" => $row->nombreEmergencistaAtencionInicial,
            "numeroColegioMedicoAtencionInicial" => $row->numeroColegioMedicoAtencionInicial,
            "trasladadoPorIdAtencionInicial" => $row->trasladadoPorIdAtencionInicial,
            "examenEspecificoAtencionInicial" => $row->examenEspecificoAtencionInicial,
            "tratamientoEspecificoAtencionInicial" => $row->tratamientoEspecificoAtencionInicial,
            "examenRealizadoIdAtencionInicial" => $row->examenRealizadoIdAtencionInicial,
            "tipoAltaMedicaIdAltaMedica" => $row->tipoAltaMedicaIdAltaMedica,
            "fechaAltaMedica" => $row->fechaAltaMedica,
            "medicoTratanteAltaMedica" => $row->medicoTratanteAltaMedica,
            "numeroColegioMedicoAltaMedica" => $row->numeroColegioMedicoAltaMedica,
            "estadoAccidentadoIdDiagnostico" => $row->estadoAccidentadoIdDiagnostico,
            "tipoInvalidezIdInvalidez" => $row->tipoInvalidezIdInvalidez,
            "descripcionCausaInvalidez" => $row->descripcionCausaInvalidez,
            "medicoTratante" => $row->medicoTratante,
            "numeroColegioMedicoInvalidez" => $row->numeroColegioMedicoInvalidez,
            "opinionMedicoAuditorInvalidez" => $row->opinionMedicoAuditorInvalidez,
            "gradoInvalidezIdInvalidez" => $row->gradoInvalidezIdInvalidez,
            "comentarioInvalidez" => $row->comentarioInvalidez,
            "fechaHoraMuerte" => $row->fechaHoraMuerte,
            "centroMedicoIdMuerte" => $row->centroMedicoIdMuerte,
            "medicoTratanteMuerte" => $row->medicoTratanteMuerte,
            "numeroColegioMedicoMuerte" => $row->numeroColegioMedicoMuerte,
            "causaCIEIdMuerte" => $row->causaCIEIdMuerte,
            "causaEspecificaMuerte" => $row->causaEspecificaMuerte,
            "numeroNecropsiaMuerte" => $row->numeroNecropsiaMuerte,
            "fechaNecropsiaMuerte" => $row->fechaNecropsiaMuerte,
            "funerariaMuerte" => $row->funerariaMuerte,
            "cementerioMuerte" => $row->cementerioMuerte,
            "prioridadCasoIdComentario" => $row->prioridadCasoIdComentario,
            "comentariosComentario" => $row->comentariosComentario,
            "conceptoAhorroSegusComentario" => $row->conceptoAhorroSegusComentario,
            "montoAhorroEstimadoComentario" => $row->montoAhorroEstimadoComentario,
            "reservagastoMedico" => $row->reservagastoMedico,
            "reservaDiscapacidad" => $row->reservaDiscapacidad,
            "reservaInvalidez" => $row->reservaInvalidez,
            "reservaGastoMuerte" => $row->reservaGastoMuerte,
            "reservaSepelio" => $row->reservaSepelio,
            "trasladadoDeIdAtencionInicial" => $row->trasladadoDeIdAtencionInicial,
            "fechaDatosGenerales" => $row->fechaDatosGenerales,
            "fechaSegundaVisitaAlta" => $row->fechaSegundaVisitaAlta,
            "fechaTerceraVisitaAlta" => $row->fechaTerceraVisitaAlta,
            "activo" => $row->activo,
            "ubigeoAccidentado" => $row->ubigeoAccidentado,
            "enviado" => $row->enviado,
            "topeMaximoGastoMedico" => $row->topeMaximoGastoMedico,
            "topeMaximoInvalidez" => $row->topeMaximoInvalidez,
            "topeMaximoIncapacidad" => $row->topeMaximoIncapacidad,
            "topeMaximoMuerte" => $row->topeMaximoMuerte,
            "topeMaximoSepelio" => $row->topeMaximoSepelio,
            "primerNombreAccidentado" => $row->primerNombreAccidentado,
            "segungoNombreAccidentado" => $row->segungoNombreAccidentado,
            "apellidoPaternoAccidentado" => $row->apellidoPaternoAccidentado,
            "apellidoMaternoAccidentado" => $row->apellidoMaternoAccidentado,
            "uit" => $row->uit,
            "reservaDiscapacidadDias" => $row->reservaDiscapacidadDias,
            "pdf" => $row->pdf,
            "cerrado" => $row->cerrado,
            "numeroAccidentadoCorrelativo" => $row->numeroAccidentadoCorrelativo,
            "fechaCierre" => $row->fechaCierre,
            "comentarioCierre" => $row->comentarioCierre,
            "tipoCierreId" => $row->tipoCierreId,
            "reservaInvalidezPorcentaje" => $row->reservaInvalidezPorcentaje,
            "siniestros_siniestroId" => $row->siniestros_siniestroId
            ]);

            $accidentados[] = $siniestro;
        }

        return $accidentados;
    }

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
