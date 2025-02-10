<?php

namespace Modules\Notifications\Infrastructure\In\Controller;

use App\Controllers\BaseController;
use Config\Services;
use Exception;

use Modules\Notifications\Config\Services as NotificationServices;

class CreateNotificationController extends BaseController
{
    protected $notificationUserService;

    public function __construct()
    {
        $this->notificationUserService = NotificationServices::notificationUserService();
    }

    public function send()
    {
        $logger = Services::logger();
        try{
            $logger->error("Vamos a enviar la notificacion");
            //return successResponse($this->notificationUserService->sendCreatedUser("lizandro.alipazaga@gmail.com", "Lizandro Alipazaga", "EMAIL_CONF_ACCOUNT"));
            return null;
        }catch(Exception $e){
            $logger->error($e->getMessage());
            return errorResponse('Hubo un error al enviar la notificacion');
        }
    }
}
