<?php

namespace Modules\Notifications\Application\Service;

use Modules\Notifications\Infrastructure\Out\Persistence\Repository\NotificationRepository;
use Modules\Notifications\Infrastructure\Out\Persistence\Repository\TemplateRepository;
use Modules\Notifications\Infrastructure\Out\Web\NotificationAdapter;
use Modules\Notifications\Domain\Notification;
use Ramsey\Uuid\Uuid;
use Config\Services;
use DateTime;
use Exception;

class NotificationService
{
    protected $notificationRepository;
    protected $templateRepository;
    protected $notificationAdapter;
    protected $fromEmail;
    protected $fromName;
    protected $logger;

    private const TEMPLATE_TYPE_EMAIL = "EMAIL";

    public function __construct(NotificationRepository $notificationRepository, TemplateRepository $templateRepository, NotificationAdapter $notificationAdapter)
    {
        $this->notificationRepository = $notificationRepository;
        $this->templateRepository = $templateRepository;
        $this->notificationAdapter = $notificationAdapter;
        $this->fromEmail = env("email.fromEmail");
        $this->fromName = env("email.fromName");
        $this->logger = Services::logger();
    }

    public function send($notificationData)
    {
        try {
            // Buscamos la plantilla para el envio
            $this->logger->info("Iniciamos el proceso de envio de notificaciones");
            $template = $this->templateRepository->findByTemplateCode($notificationData->templateCode);
            if (!$template["success"]) {
                return errorResponse($template["message"]);
            }
            // Actualizamos los datos de la notificacion y lo guardamos
            $this->updateNotificationDataFromTemplate($notificationData, $template["data"]);
            $savedNotification = $this->saveNotification($notificationData, $template["data"]);
            if (!$savedNotification["success"]) {
                return errorResponse($savedNotification["message"]);
            }
            // Enviamos la notificacion de acuerdo al tipo indicado en la plantilla
            $notificationSent = null;
            if ($notificationData->type == self::TEMPLATE_TYPE_EMAIL) {
                $notificationSent = $this->notificationAdapter->sendNotificationByEmail($notificationData);
            } else {
                return errorResponse("La plantilla {$notificationData->templateCode} con tipo {$notificationData->type}, no tiene un cliente desarrollado");
            }
            // Validamos si la notificacion se envio correctamente
            if (!$notificationSent["success"]) {
                return errorResponse($notificationSent["message"]);
            }
            $this->logger->info("El proceso de notificacion termino correctamente");
            // El proceso se llevo a cabo correctamente
            return successResponse("Notificacion enviada correctamente");
        } catch (Exception $e) {
            return errorResponse();
        }
    }

    private function updateNotificationDataFromTemplate($notificationData, $template)
    {
        $templateData = $notificationData->templateData;
        $templateData["uuid"] = Uuid::uuid4()->toString();

        $notificationData->type = $template["tipo"];
        $notificationData->from = $this->fromEmail;
        $notificationData->nameFrom = $this->fromName;
        $notificationData->cc = $template["cc"];
        $notificationData->bcc = $template["bcc"];
        $notificationData->subjectContent = $this->replacePlaceholders($template["subject"], $notificationData->subjectData);
        $notificationData->templateData = $templateData;
        $notificationData->templateContent = $this->replacePlaceholders($template["contenido"], $templateData);
    }

    private function replacePlaceholders(string $contenido, array $data): string
    {
        foreach ($data as $key => $value) {
            $contenido = str_replace("{{" . $key . "}}", $value, $contenido);
        }
        return $contenido;
    }

    private function saveNotification($notificationData, $template)
    {
        $templateData = $notificationData->templateData;
        $expirationDays = $template["dias_expira"];
        $expirationDate = new DateTime();
        $expirationDate->modify("+{$expirationDays} days");

        $notification = new Notification();
        $notification->codeplantilla = $notificationData->templateCode;
        $notification->tipo = $notificationData->type;
        $notification->fecha = date("Y-m-d H:m:s");
        $notification->fexpiracion = $expirationDate->format('Y-m-d H:i:s');
        $notification->usuario = $templateData["nombre"];
        $notification->email = $notificationData->to;
        $notification->cc = $notificationData->cc;
        $notification->bcc = $notificationData->bcc;
        $notification->topicfcm = $template["topic_fcm"];
        $notification->subject = $notificationData->subjectContent;
        $notification->contenido = $notificationData->templateContent;
        $notification->uuid = $templateData["uuid"];

        return $this->notificationRepository->save($notification);
    }
}
