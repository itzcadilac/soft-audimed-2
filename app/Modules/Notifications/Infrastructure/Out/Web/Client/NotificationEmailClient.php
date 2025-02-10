<?php

namespace Modules\Notifications\Infrastructure\Out\Web\Client;

use Config\Services;
use Modules\Notifications\Infrastructure\Out\Web\Entity\NotificationEmail;

use function PHPUnit\Framework\isNull;

class NotificationEmailClient
{
    protected $emailService;
    protected $logger;

    public function __construct()
    {
        $this->emailService = Services::email();
        $this->logger = Services::logger();
    }

    public function send(NotificationEmail $notification)
    {
        $this->logger->info("Enviaremos una notificacion por email a: {$notification->to}");
        // Configuramos el mensaje de correo electronico
        $this->emailService->setFrom($notification->from, $notification->nameFrom);
        $this->emailService->setTo($notification->to);
        if (!isNull($notification->cc)) {
            $this->emailService->setCC($notification->cc);
        }
        if (!isNull($notification->bcc)) {
            $this->emailService->setBCC($notification->bcc);
        }
        $this->emailService->setSubject($notification->subjectContent);
        $this->emailService->setMessage($notification->templateContent);
        // Enviamos la notificacion y validamos
        if ($this->emailService->send()) {
            $this->logger->info("La notificacion se envio correctamente!!");
            return successResponse($notification);
        } else {
            $this->logger->error("La notificacion no se pudo enviar!!");
            $this->logger->error(json_encode($notification));
            return errorResponse("Error al enviar el correo: " . $this->emailService->printDebugger(['headers']));
        }
    }
}
