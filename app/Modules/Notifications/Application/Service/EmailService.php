<?php

namespace Modules\Notifications\Application\Service;

use Config\Services;

class EmailService
{
    protected $email;

    public function __construct()
    {
        $this->email = Services::email();
    }

    /**
     * Enviar un correo basado en una plantilla de la base de datos
     *
     * @param string $to Destinatario
     * @param string $plantilla Html de la plantilla a usar
     * @param array $data Datos a reemplazar en la plantilla
     * @return bool|string True si se envió correctamente, mensaje de error si falló
     */
    public function send(
        string $to,
        array $plantilla,
        string $fromEmail,
        string $fromName,
        array $data = []
    ) {
        // Reemplazar los placeholders con los datos reales
        $contenido = $this->replacePlaceholders($plantilla['contenido'], $data);
        // Configurar el correo
        $this->email->setFrom($fromEmail, $fromName);
        $this->email->setTo($to);
        $this->email->setSubject($plantilla['subject']);
        $this->email->setMessage($contenido);

        if ($this->email->send()) {
            return successResponse($contenido);
        } else {
            return errorResponse("Error al enviar el correo: " . $this->email->printDebugger(['headers']));
        }
    }

    /**
     * Reemplazar los placeholders en la plantilla con los valores reales
     *
     * @param string $contenido Contenido de la plantilla
     * @param array $data Datos a insertar
     * @return string
     */
    private function replacePlaceholders(string $contenido, array $data): string
    {
        foreach ($data as $key => $value) {
            $contenido = str_replace("{{" . $key . "}}", $value, $contenido);
        }
        return $contenido;
    }
}
