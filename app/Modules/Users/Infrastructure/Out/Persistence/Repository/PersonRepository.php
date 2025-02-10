<?php

namespace Modules\Users\Infrastructure\Out\Persistence\Repository;

use Modules\Users\Domain\Person;
use Modules\Users\Infrastructure\Out\Persistence\Model\PersonModel;
use Config\Services;
use Exception;

use function PHPUnit\Framework\isNull;

class PersonRepository
{
    protected $person;
    protected $logger;

    public function __construct()
    {
        $this->person = new PersonModel();
        $this->logger = Services::logger();
    }

    public function findByDocumentTypeAndDocumentNumber($documentType, $documentNumber)
    {
        try {
            // Realizamos la query
            $result = $this->person->where('tipdocumento', $documentType)
                ->where('documento', $documentNumber)
                ->first();
            // Si no se pudo obtener el registro devolvemos un error
            if (!$result) {
                return errorResponse("La persona con el documento <{$documentType}> <{$documentNumber}>, no ha sido encontrada.");
            }
            // Si se logro obtener el registro lo devolvemos en la respuesta
            return successResponse($result);
        } catch (Exception $e) {
            $this->logger->error("PersonRepository -> findByDocumentTypeAndDocumentNumber: {$e->getMessage()}");
            return errorResponse();
        }
    }

    public function save(Person $person)
    {
        try {
            // LLenamos los campos de auditoria
            $this->insertAuditData($person);
            // Realizamos la query
            $result = $this->person->save($person);
            // Si no se pudo guardar el registro devolvemos un error
            if (!$result) {
                return errorResponse("No se pudo guardar el registro en: personas");
            }
            // Si el registro se guardo correctamente obtenemos si id
            $savedPersonId = $this->person->insertID();
            // Devolvemos el registro creado en la respuesta
            return successResponse($this->person->find($savedPersonId));
        } catch (Exception $e) {
            $this->logger->error("PersonRepository -> save: {$e->getMessage()}");
            return errorResponse();
        }
    }

    private function insertAuditData(Person $user)
    {
        if (isNull($user->idepersona)) {
            $user->fecregistro = date("Y-m-d H:m:s");
        } else {
            //$user->fupdated = date("Y-m-d H:m:s");
        }
    }
}
