<?php

namespace Modules\Notifications\Infrastructure\Out\Persistence\Repository;

use Modules\Notifications\Infrastructure\Out\Persistence\Model\NotificationModel;
use Modules\Notifications\Domain\Notification;
use Config\Services;
use Exception;

use function PHPUnit\Framework\isNull;

class NotificationRepository
{
    protected $notificationModel;
    protected $logger;
    protected $session;

    public function __construct()
    {
        $this->notificationModel = new NotificationModel();
        $this->logger = Services::logger();
        $this->session = service('session');
    }

    public function findById(int $notificationId)
    {
        try {
            // Realizamos la query
            $result = $this->notificationModel->find($notificationId);
            // Si no se pudo obtener el registro devolvemos un error
            if (!$result) {
                return errorResponse("La notificacion con id <{$notificationId}>, no ha sido encontrada.");
            }
            // Si se logro obtener el registro lo devolvemos en la respuesta
            return successResponse($result);
        } catch (Exception $e) {
            $this->logger->error("NotificationRepository -> findById: {$e->getMessage()}");
            return errorResponse();
        }
    }

    public function findByEmailAndUsername(string $email, string $username)
    {
        try {
            // Realizamos la query
            $result = $this->notificationModel->where('email', $email)->where('usuario', $username)->findAll();
            // Si no se pudo obtener el registro devolvemos un error
            if (!$result) {
                return errorResponse("La notificacion con el email <{$email}>, no ha sido encontrada.");
            }
            // Si se logro obtener el registro lo devolvemos en la respuesta
            return successResponse($result);
        } catch (Exception $e) {
            $this->logger->error("NotificationRepository -> findByUuidAndEmail: {$e->getMessage()}");
            return errorResponse();
        }
    }

    public function findByUuidAndEmail(string $uuid, string $email)
    {
        try {
            // Realizamos la query
            $result = $this->notificationModel->where('uuid', $uuid)->where('email', $email)->first();
            // Si no se pudo obtener el registro devolvemos un error
            if (!$result) {
                return errorResponse("La notificacion con uuid <{$uuid}> e email <{$email}>, no ha sido encontrada.");
            }
            // Si se logro obtener el registro lo devolvemos en la respuesta
            return successResponse($result);
        } catch (Exception $e) {
            $this->logger->error("NotificationRepository -> findByUuidAndEmail: {$e->getMessage()}");
            return errorResponse();
        }
    }

    public function save(Notification $notification)
    {
        try {
            // LLenamos los campos de auditoria
            $this->insertAuditData($notification);
            // Realizamos la query
            $result = $this->notificationModel->save($notification);
            // Si no se pudo guardar el registro devolvemos un error
            if (!$result) {
                return errorResponse("No se pudo guardar el registro en: notificaciones");
            }
            // Si el registro se guardo correctamente obtenemos si id
            $savedNotificationId = $this->notificationModel->insertID();
            // Devolvemos el registro creado en la respuesta
            return successResponse($this->notificationModel->find($savedNotificationId));
        } catch (Exception $e) {
            $this->logger->error("NotificationRepository -> save: {$e->getMessage()}");
            return errorResponse();
        }
    }

    private function insertAuditData(Notification $notification)
    {
        if (isNull($notification->idnotificacion)) {
            $notification->createdat = date("Y-m-d H:m:s");
            $notification->createdby = $this->session->get("usuario");
        } else {
            $notification->updatedat = date("Y-m-d H:m:s");
            $notification->updatedby = $this->session->get("usuario");
        }
    }
}
