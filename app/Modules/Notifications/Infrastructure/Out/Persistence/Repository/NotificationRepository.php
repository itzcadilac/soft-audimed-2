<?php

namespace Modules\Notifications\Infrastructure\Out\Persistence\Repository;

use Modules\Notifications\Infrastructure\Out\Persistence\Model\NotificationModel;
use Config\Services;
use Exception;
use Modules\Notifications\Domain\Notification;

use function PHPUnit\Framework\isNull;

class NotificationRepository {
    protected $notificationModel;
    protected $logger;

    public function __construct()
    {
        $this->notificationModel = new NotificationModel();
        $this->logger = Services::logger();
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
            $savedPersonId = $this->notificationModel->insertID();
            // Devolvemos el registro creado en la respuesta
            return successResponse($this->notificationModel->find($savedPersonId));
        } catch (Exception $e) {
            $this->logger->error("NotificationRepository -> save: {$e->getMessage()}");
            return errorResponse();
        }
    }

    private function insertAuditData(Notification $notification)
    {
        if (!isNull($notification->idnotificacion)) {
            $notification->createdat = date("Y-m-d H:m:s");
        } else {
            //$notification->fupdated = date("Y-m-d H:m:s");
        }
    }
}