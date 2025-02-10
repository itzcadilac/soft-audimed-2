<?php

namespace Modules\Security\Infrastructure\In\Controller;

use App\Controllers\BaseController;
use DateTime;
use Modules\Notifications\Config\Services as NotificationServices;
use Modules\Common\Audit\Enum\AuditTypeEnum;
use Modules\Notifications\Application\Service\NotificationService;

class ConfirmAccountController extends BaseController
{
    protected $notificationService;
    protected $updateNotificationService;

    private const USER_CONFIRM_FORM_PATH = 'security-module/form-user-confirm.twig';
    private const INVALID_LINK_VIEW = 'security-module/view-user-confirm-invalid.twig';
    private const EXPIRED_LINK_VIEW = 'security-module/view-user-confirm-expired.twig';
    private const CANCELED_LINK_VIEW = 'security-module/view-user-confirm-canceled.twig';

    public function __construct()
    {
        $this->notificationService = NotificationServices::getNotificationService();
        $this->updateNotificationService = NotificationServices::updateNotificationService();
    }

    public function confirmForm()
    {
        // Obtenemos los datos del request
        $uuid = $this->request->getGet('uuid');
        $email = $this->request->getGet('email');
        // Obtenemos los datos de la notificacion generada en el registro
        $notification = $this->notificationService->getByUuidAndEmail($uuid, $email);
        // Si la notificacion no existe o esta inactiva se envia la pantalla link invalido
        if (!$notification["success"] || $this->isNotificationInactive($notification["data"])) {
            auditEventTrigger(
                AuditTypeEnum::TYPE_URL,
                ["uuid" => $uuid, "email" => $email, "mensaje" => "Enlace inválido"],
                "Acceso a URL de seguridad"
            );
            return $this->render(self::INVALID_LINK_VIEW);
        }
        // Obtenemos los datos de la notificacion encontrada
        $notificationData = $notification["data"];
        // Si la notificacion ha expirado lanzamos la pantalla de expirado
        if ($this->isNotificationExpired($notificationData)) {
            auditEventTrigger(
                AuditTypeEnum::TYPE_URL,
                [
                    "uuid" => $uuid,
                    "email" => $email,
                    "mensaje" => "Enlace expirado, comuníquese con el administrador para generar una nuevo enlace"
                ],
                "Acceso a URL de seguridad"
            );
            $this->updateNotificationService->disableNotification($notificationData["idnotificacion"]);
            return $this->render(self::EXPIRED_LINK_VIEW);
        }
        // Si la notifiacion ha sido cancelada se envia la pantalla de cancelado
        if ($this->isNotificationCanceled($notificationData)) {
            auditEventTrigger(
                AuditTypeEnum::TYPE_URL,
                [
                    "uuid" => $uuid,
                    "email" => $email,
                    "mensaje" => "La cuenta del usuario está DESACTIVADA|BLOQUEADA|ANULADA, comuníquese con el administrador para generar una nuevo enlace"
                ],
                "Acceso a URL de seguridad"
            );
            $this->updateNotificationService->disableNotification($notificationData["idnotificacion"]);
            return $this->render(self::CANCELED_LINK_VIEW);
        }
        // Lanzamos un evento de auditoria
        auditEventTrigger(AuditTypeEnum::TYPE_URL, ["uuid" => $uuid, "email" => $email], "Acceso a URL de seguridad");
        // Si todo esta bien enviamos la pantalla de confirmacio de cuenta
        return $this->render(self::USER_CONFIRM_FORM_PATH, ["nombre" => $notificationData["usuario"]]);
    }

    private function isNotificationInactive(array $notificationData): bool
    {
        return $notificationData["activo"] == 0;
    }

    private function isNotificationExpired(array $notificationData): bool
    {
        return $notificationData["activo"] == 1 && new DateTime() > new DateTime($notificationData["fexpiracion"]);
    }

    private function isNotificationCanceled(array $notificationData): bool
    {
        return $notificationData["activo"] == 1 && !$this->isNotificationExpired($notificationData) && $notificationData["estadoreg"] <> 0;
    }
}
