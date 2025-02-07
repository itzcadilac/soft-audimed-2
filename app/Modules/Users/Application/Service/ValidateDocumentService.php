<?php

namespace Modules\Users\Application\Service;

use Modules\Users\Domain\Person;
use Modules\Users\Infrastructure\Out\Persistence\Repository\PersonRepository;
use Modules\Users\Infrastructure\Out\Web\PersonAdapter;
use Config\Services;
use Exception;

class ValidateDocumentService
{
    protected $personRepository;
    protected $personAdapter;
    protected $logger;

    public function __construct(PersonRepository $personRepository, PersonAdapter $personAdapter)
    {
        $this->personRepository = $personRepository;
        $this->personAdapter = $personAdapter;
        $this->logger = Services::logger();
    }

    public function validate(Person $person)
    {
        try {
            // Consultamos en la base de datos local
            $localPersonFound = $this->personRepository->findByDocumentTypeAndDocumentNumber($person->tipdocumento, $person->documento);
            if ($localPersonFound["success"]) {
                return successResponse($localPersonFound["data"]);
            }
            // Si el registro no esta en local, lo consultamos con el WS
            $externalPersonFound = null;
            if ($person->tipdocumento == DOCUMENT_TYPE_ID_DNI) {
                $externalPersonFound = $this->personAdapter->findPersonByDNI($person->documento);
            } else if ($person->tipdocumento == DOCUMENT_TYPE_ID_CEE) {
                $externalPersonFound = $this->personAdapter->findPersonByCEE($person->documento);
            } else {
                return errorResponse("El tipo de documento indicado no es valido para realizar busquedas");
            }
            // Validamos que la persona haya sido encontrada
            if (!$externalPersonFound["success"]) {
                return errorResponse($externalPersonFound["message"]);
            }
            // Guardamos la persona y devolvemos el registro en la respuesta
            $newPerson = new Person($externalPersonFound["data"]);
            $savedPerson = $this->personRepository->save($newPerson);
            return successResponse($savedPerson["data"]);
        } catch (Exception $e) {
            $this->logger->error("ValidateDocumentService -> validate: {$e->getMessage()}");
            return errorResponse();
        }
    }
}
