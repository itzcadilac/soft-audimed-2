<?php

namespace Modules\Users\Infrastructure\Out\Web\Mapper;

use Modules\Users\Domain\Person;
use Modules\Users\Infrastructure\Out\Web\Entity\PersonTypeCEE;
use Modules\Users\Infrastructure\Out\Web\Entity\PersonTypeDNI;

class PersonMapper {
    public static function toDomainFromTypeDNI(PersonTypeDNI $personEntity): Person{
        $personDomain = new Person();
        $personDomain->documento = $personEntity->numero;
        $personDomain->nombres = trim($personEntity->nombres ?? '');
        $personDomain->apepaterno = trim($personEntity->apellidopaterno ?? '');
        $personDomain->apematerno = trim($personEntity->apellidomaterno ?? '');
        $personDomain->tipdocumento = DOCUMENT_TYPE_ID_DNI;
        return $personDomain;
    }

    public static function toDomainFromTypeCEE(PersonTypeCEE $personEntity): Person{
        $personDomain = new Person();
        $personDomain->documento = $personEntity->numero;
        $personDomain->nombres = trim($personEntity->nombres ?? '');
        $personDomain->apepaterno = trim($personEntity->apellidopaterno ?? '');
        $personDomain->apematerno = trim($personEntity->apellidomaterno ?? '');
        $personDomain->tipdocumento = DOCUMENT_TYPE_ID_CEE;
        return $personDomain;
    }
}