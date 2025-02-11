<?php

namespace Modules\Security\Infrastructure\In\Controller;

use App\Controllers\BaseController;
use Modules\Common\Audit\Enum\AuditTypeEnum;
use Modules\Notifications\Config\Services as NotificationServices;
use Modules\Users\Config\Services as UserServices;
use Modules\Users\Domain\User;
use Modules\Security\Config\Services as SecurityServices;
use Config\Services;
use DateTime;
use Exception;

class ConfirmAccountController extends BaseController
{
    protected $notificationService;
    protected $updateNotificationService;
    protected $userService;
    protected $userRegisterService;
    protected $logger;
    protected $loginService;

    private const USER_CONFIRM_FORM_PATH = 'security-module/form-user-confirm.twig';
    private const INVALID_LINK_VIEW = 'security-module/view-user-confirm-invalid.twig';
    private const EXPIRED_LINK_VIEW = 'security-module/view-user-confirm-expired.twig';
    private const CANCELED_LINK_VIEW = 'security-module/view-user-confirm-canceled.twig';

    public function __construct()
    {
        $this->notificationService = NotificationServices::getNotificationService();
        $this->updateNotificationService = NotificationServices::updateNotificationService();
        $this->userService = UserServices::userService();
        $this->userRegisterService = UserServices::userRegisterService();
        $this->logger = Services::logger();
        $this->loginService = SecurityServices::loginService();
    }

    public function confirmAction()
    {
        try {
            // Obtenemos los datos del request
            $request = $this->request->getPost();
            // Validamos los datos
            $formValidated = $this->validateForm();
            if (!$formValidated->isValid) {
                session()->setFlashdata('errors', $formValidated->data);
                return redirect()->back();
            }
            // Confirma el password
            $this->userRegisterService->confirmPassword($request["username"], $request["password"], $request["email"]);
            // Obtiene los datos del cliente
            $ipAddress = $this->request->getIPAddress();
            $hostname = gethostbyaddr($ipAddress);
            // Iniciamos la sesion
            $loggedIn = $this->loginService->loginUser($request["username"], $request["password"], $ipAddress, $hostname);
            if ($loggedIn['success']) {
                // Se guardan los datos del registro en auditoria
                auditEventTrigger(AuditTypeEnum::TYPE_SESSION, "Inicio de sesión OK");
                return redirect()->to('/inicio');
            } else {
                return redirect()->back()->with('error', 'Credenciales inválidas');
            }
        } catch (Exception $e) {
            $this->logger->error("ConfirmAccountController -> confirmAction: {$e->getMessage()}");
            return $this->responseError($e->getMessage());
        }
    }

    private function validateForm()
    {
        $validation = array("isValid" => true, "data" => []);

        $rules = [
            'password' => 'required|min_length[6]|max_length[32]|regex_match[/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@#$%&*!]).+$/]',
            'password_confirm' => 'required|matches[password]',
            'username' => 'required',
            'email' => 'required'
        ];

        $messages = [
            "password" => [
                "required" => "El campo password es requerido",
                "min_length" => "La contraseña debe tener al menos 6 caracteres.",
                "max_length" => "La contraseña debe tener 32 caracteres como máximo.",
                "regex_match" => "La contraseña debe incluir al menos una letra mayúscula, una minúscula, un número y un carácter especial (@, #, $, %, &, *)."
            ],
            "password_confirm" => [
                "required" => "La confirmación de la contraseña es requerida.",
                "matches" => "Las contraseñas ingresadas no coinciden."
            ],
            "username" => [
                "required" => "La información del formulario no es válida.",
            ],
            "email" => [
                "required" => "La información del formulario no es válida",
            ]
        ];

        if (!$this->validate($rules, $messages)) {
            $validation["isValid"] = false;
            $validation["data"] = $this->validator->getErrors();
        }

        return (object) $validation;
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
                "Acceso a URL de seguridad",
                ["uuid" => $uuid, "email" => $email, "mensaje" => "Enlace inválido"]
            );
            return $this->render(self::INVALID_LINK_VIEW);
        }
        // Obtenemos los datos de la notificacion encontrada
        $notificationData = $notification["data"];
        // Buscamos el usuario asociado a la notificacion
        $user = new User();
        $user->usuario = $notificationData["usuario"];
        $userFound = $this->userService->getUserByUsername($user);
        $userData = $userFound["data"];
        // Si la notificacion ha expirado lanzamos la pantalla de expirado
        if ($this->isNotificationExpired($notificationData)) {
            auditEventTrigger(
                AuditTypeEnum::TYPE_URL,
                "Acceso a URL de seguridad",
                [
                    "uuid" => $uuid,
                    "email" => $email,
                    "mensaje" => "Enlace expirado, comuníquese con el administrador para generar una nuevo enlace"
                ]
            );
            $this->updateNotificationService->disableNotification($notificationData["idnotificacion"]);
            return $this->render(self::EXPIRED_LINK_VIEW);
        }
        // Si la notifiacion ha sido cancelada se envia la pantalla de cancelado
        if ($this->isNotificationCanceled($notificationData)) {
            auditEventTrigger(
                AuditTypeEnum::TYPE_URL,
                "Acceso a URL de seguridad",
                [
                    "uuid" => $uuid,
                    "email" => $email,
                    "mensaje" => "La cuenta del usuario está DESACTIVADA|BLOQUEADA|ANULADA, comuníquese con el administrador para generar una nuevo enlace"
                ]
            );
            $this->updateNotificationService->disableNotification($notificationData["idnotificacion"]);
            return $this->render(self::CANCELED_LINK_VIEW);
        }
        // Lanzamos un evento de auditoria
        auditEventTrigger(AuditTypeEnum::TYPE_URL, "Acceso a URL de seguridad", ["uuid" => $uuid, "email" => $email]);
        // Si todo esta bien enviamos la pantalla de confirmacio de cuenta
        $formData = ["nombre" => $userData["nombres"], "username" => $notificationData["usuario"], "email" => $email, 'errors' => session()->getFlashdata('errors')];
        return $this->render(self::USER_CONFIRM_FORM_PATH, $formData);
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
