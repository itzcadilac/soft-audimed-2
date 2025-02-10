<?php

namespace Modules\Notifications\Config;

use CodeIgniter\Router\RouteCollection;

const NOTIFICATIONS_MODULE_NAMESPACE = 'Modules\Notifications\Infrastructure\In\Controller';

/**
 * Define rutas específicas para el módulo de seguridad
 *
 * @param RouteCollection $routes
 */

function NotificationsRoutes(RouteCollection $routes)
{
    $routes->group('notificaciones', ['filter' => 'auth', 'namespace' => NOTIFICATIONS_MODULE_NAMESPACE], function ($routes) {
        $routes->get('send', 'CreateNotificationController::send');
    });
}
