<?php

namespace Modules\Notifications\Application\Service;

use Exception;
use Modules\Notifications\Infrastructure\Out\Persistence\Repository\NotificationRepository;
use Modules\Notifications\Infrastructure\Out\Persistence\Repository\TemplateRepository;
use Ramsey\Uuid\Uuid;
use Config\Services;
use Modules\Notifications\Domain\Notification;

class NotificationUserService
{
    protected $notificationRepository;
    protected $templateRepository;
    protected $emailService;
    protected $fromEmail;
    protected $fromName;
    protected $logger;

    public function __construct(NotificationRepository $notificationRepository, TemplateRepository $templateRepository, EmailService $emailService)
    {
        $this->notificationRepository = $notificationRepository;
        $this->templateRepository = $templateRepository;
        $this->emailService = $emailService;
        $this->fromEmail = env("email.fromEmail");
        $this->fromName = env("email.fromName");
        $this->logger = Services::logger();
    }

    public function sendCreatedUser($dataNotification){
        try{
            $this->logger->debug("Vamos notificar al correo {$dataNotification["to"]}");
            $template = $this->templateRepository->findByTemplateCode($dataNotification["templateCode"]);
            if(!$template["success"]){
                return errorResponse($template["message"]);
            }
            $uuid = Uuid::uuid4()->toString();
            $data = [
                "nombre" => $dataNotification["nameTo"],
                "uuid" => $uuid,
                "email" => $dataNotification["to"]
            ];
            $notificationSent = $this->emailService->send($dataNotification["to"], $template["data"], $this->fromEmail, $this->fromName, $data);
            if(!$notificationSent["success"]){
                return errorResponse($notificationSent["message"]);
            }
            $this->logger->debug("La notificacion se envio correctamente a -> {$dataNotification["to"]}");
            $this->saveNotification($dataNotification, $template, $data, $notificationSent["data"]);
            return successResponse("Notificacion enviada correctamente");
        }catch(Exception $e){
            return errorResponse();
        }
    }

    private function saveNotification($dataNotification, $template, $data, $notificationSent){
        $notification = new Notification();
        $notification->codeplantilla = $dataNotification["templateCode"];
        $notification->tipo = "usuario";
        $notification->fecha = date("Y-m-d H:m:s");
        $notification->fenvio = date("Y-m-d H:m:s");
        $notification->usuario = $dataNotification["nameTo"];
        $notification->email = $dataNotification["to"];
        $notification->subject = $notificationSent["subject"];
        $notification->contenido = $notificationSent["contenido"];
        $notification->uuid = $data["uuid"];
        $notification->enviado = 1;
        $this->notificationRepository->save($notification);
    }
}
