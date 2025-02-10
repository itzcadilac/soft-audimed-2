<?php

namespace Modules\Users\Infrastructure\In\Controller;

use App\Controllers\BaseController;
use Modules\Users\Config\Services as UserServices;
use Modules\Users\Domain\Person;
use Config\Services;
use Exception;

class ValidateDocumentController extends BaseController
{
    protected $validateDocumentService;

    public function __construct()
    {
        $this->validateDocumentService = UserServices::validateDocumentService();
    }

    public function getValidateDocumentAction($documentType = null, $documentNumber = null)
    {
        $logger = Services::logger();

        try {
            // Obtenemos y validamos los datos del request
            $request = [
                'document_type' => $documentType,
                'document_number' => $documentNumber
            ];
            $requestValidated = $this->validateRequest($request);
            if (!$requestValidated->isValid) {
                return $this->responseBusinessError($requestValidated->data);
            }
            // Obtenemos el objeto persona y realizamos la validacion
            $person = $this->getPerson($request);
            $result = $this->validateDocumentService->validate($person);
            // Proceso de respuesta
            if (!$result["success"]) {
                return $this->responseBusinessError($result["message"]);
            }
            return $this->responseOk($result["data"]);
        } catch (Exception $e) {
            $logger->error($e->getMessage());
            return $this->responseError("Hubo un error al validar el documento <{$documentType}> <{$documentNumber}>");
        }
    }

    private function validateRequest($request)
    {
        $validation = array("isValid" => true, "data" => []);

        $rules = [
            'document_type' => 'required',
            'document_number' => 'required'
        ];

        $validationService = Services::validation();
        $validationService->setRules($rules);

        if (!$validationService->run($request)) {
            $validation["isValid"] = false;
            $validation["data"] = $this->validator->getErrors();
        }

        return (object) $validation;
    }

    private function getPerson($request)
    {
        $person = new Person();
        $person->tipdocumento = $request["document_type"];
        $person->documento = $request["document_number"];
        return $person;
    }
}
