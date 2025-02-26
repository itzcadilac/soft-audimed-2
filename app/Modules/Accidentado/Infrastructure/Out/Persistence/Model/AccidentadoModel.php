<?php

namespace Modules\Accidentado\Infrastructure\Out\Persistence\Model;

use CodeIgniter\Model;
use Modules\Accidentado\Domain\Accidentado;
use Modules\Siniestro\Domain\Siniestro;
use Modules\Users\Domain\MovUser;
use Config\Services;

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
        // Obtener la instancia del constructor de consultas
        $builder = $this->db->table('accidentado');  // Tabla principal

        // Realizamos el JOIN
        $builder->select('accidentado.accidentadoId, accidentado.edadAccidentado, usuarios.nombres as medicoAuditorNombre, 
                        usuarios.apellidos as medicoAuditorApellidos, accidentado.primerNombreAccidentado, 
                        accidentado.segungoNombreAccidentado, accidentado.apellidoPaternoAccidentado, accidentado.apellidoMaternoAccidentado')
                ->join('medicoauditor', 'medicoauditor.medicoauditorid = accidentado.auditorId', 'inner')
                ->join('usuarios', 'usuarios.idusuario = medicoauditor.idusuario', 'inner');

        // Ejecutamos la consulta y devolvemos los resultados
        $result = $builder->get()->getResult();

        $logger = Services::logger();

        $logger->info(json_encode($result));

        return $result;
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
