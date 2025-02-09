<?php

namespace Modules\Security\Infrastructure\In\Controller;

use App\Controllers\BaseController;
use DateTime;
use Modules\Notifications\Config\Services as NotificationServices;

class ConfirmAccountController extends BaseController
{
    protected $notificationService;

    private const USER_CONFIRM_FORM_PATH = 'security-module/form-user-confirm.twig';
    private const VALIDATION_CONFIRM = "confirmed";
    private const INVALID_LINK_VIEW = 'security-module/view-user-confirm-invalid.twig';
    private const INVALID_LINK_CODE = "invalid";
    private const EXPIRED_LINK_VIEW = 'security-module/view-user-confirm-expired.twig';
    private const EXPIRED_LINK_CODE = "expired";
    private const CANCELED_LINK_VIEW = 'security-module/view-user-confirm-canceled.twig';
    private const CANCELED_LINK_CODE = "canceled";

    public function __construct()
    {
        $this->notificationService = NotificationServices::getNotificationService();
    }

    public function confirmForm()
    {
        $uuid = $this->request->getGet('uuid');
        $email = $this->request->getGet('email');

        $notification = $this->notificationService->getByUuidAndEmail($uuid, $email);

        if (!$notification["success"] || $this->isNotificationInactive($notification["data"])) {
            return $this->render(self::INVALID_LINK_VIEW);
        }

        $notificationData = $notification["data"];

        if ($this->isNotificationExpired($notificationData)) {
            return $this->render(self::EXPIRED_LINK_VIEW);
        }

        if ($this->isNotificationCanceled($notificationData)) {
            return $this->render(self::CANCELED_LINK_VIEW);
        }

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
