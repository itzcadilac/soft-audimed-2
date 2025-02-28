<?php

namespace Modules\Users\Infrastructure\Out\Web\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Config\Services;
use Exception;

class FactilizaAPIClient
{
    protected $client;
    protected $apiUrl;
    protected $token;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiUrl = env("api.factiliza.uri");
        $this->token = env("api.factiliza.token");
    }

    public function findPerson($documentType, $documentNumber)
    {
        $logger = Services::logger();

        try {
            // Enviamos el request hacia el servicio
            $logger->info("REQUEST -> GET {$this->apiUrl}/{$documentType}/info/{$documentNumber}");
            $response = $this->client->get("{$this->apiUrl}/{$documentType}/info/{$documentNumber}", $this->getHeaders());
            // Si el servicio respondio correctamente obtenemos la data del body
            $data = json_decode($response->getBody(), true);
            // Si la data del body esta vacio devolvemos un error
            if (!isset($data['data'])) {
                $logger->warning('No hay datos en la respuesta.');
                return errorResponse('No hay datos en la respuesta.');
            }
            // Respondemos con el body de la respuesta
            return successResponse($data['data'], 'Persona encontrada.');
        } catch(RequestException $e){
            if($e->hasResponse()){
                $body = json_decode($e->getResponse()->getBody(), true);
                $logger->error("FactilizaAPIClient: {$e->getMessage()}");
                return errorResponse($body["message"] ?? 'Hubo un error al consultar el servicio.');
            }
            return errorResponse('Hubo un error al consultar el servicio.');
        } catch (Exception $e) {
            $logger->error("FactilizaAPIClient: {$e->getMessage()}");
            return errorResponse('Hubo un error inesperado.');
        }
    }

    private function getHeaders(): array
    {
        return [
            "headers" => [
                'Authorization' => "Bearer {$this->token}",
                'Accept'        => 'application/json',
            ]
        ];
    }
}
