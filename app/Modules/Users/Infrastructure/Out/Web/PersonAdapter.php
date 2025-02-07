<?php

namespace Modules\Users\Infrastructure\Out\Web;

use Modules\Users\Infrastructure\Out\Web\Client\FactilizaAPIClient;
use Modules\Users\Infrastructure\Out\Web\Entity\PersonTypeDNI;
use Modules\Users\Infrastructure\Out\Web\Mapper\PersonMapper;
use Config\Services;
use Exception;
use Modules\Users\Infrastructure\Out\Web\Entity\PersonTypeCEE;

class PersonAdapter
{
    protected $factilizaAPIClient;
    protected $logger;

    public function __construct()
    {
        $this->factilizaAPIClient = new FactilizaAPIClient();
        $this->logger = Services::logger();
    }

    public function findPersonByDNI($documentNumber)
    {
        try {
            // Buscamos a la persona por tipo y numero de documento (DNI)
            $response = $this->factilizaAPIClient->findPerson(DOCUMENT_TYPE_DNI, $documentNumber);
            if(!$response["success"]){
                return errorResponse($response["message"]);
            }
            // Si la persona existe mapeamos la respuesta
            $personTypeDNI = new PersonTypeDNI($response["data"]);            
            return successResponse(PersonMapper::toDomainFromTypeDNI($personTypeDNI));
        } catch (Exception $e) {
            echo "Dentro al exception";
            $this->logger->error("PersonAdapter -> findPersonByDNI: {$e->getMessage()}");
            return errorResponse();
        }
    }

    public function findPersonByCEE($documentNumber)
    {
        try {
            // Buscamos a la persona por tipo y numero de documento (DNI)
            $response = $this->factilizaAPIClient->findPerson(DOCUMENT_TYPE_CEE, $documentNumber);
            if(!$response["success"]){
                return errorResponse($response["message"]);
            }
            // Si la persona existe mapeamos la respuesta
            $personTypeCEE = new PersonTypeCEE($response["data"]);            
            return successResponse(PersonMapper::toDomainFromTypeCEE($personTypeCEE));
        } catch (Exception $e) {
            $this->logger->error("PersonAdapter -> findPersonByCEE: {$e->getMessage()}");
            return errorResponse();
        }
    }
}
