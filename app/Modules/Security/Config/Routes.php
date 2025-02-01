<?php

namespace Modules\Security\Config;

use CodeIgniter\Router\RouteCollection;

const SECURITY_MODULE_NAMESPACE = 'Modules\Security\Infrastructure\In\Controller';

/**
 * Define rutas específicas para el módulo de seguridad
 *
 * @param RouteCollection $routes
 */

function SecurityRoutes(RouteCollection $routes)
{
    $routes->group('', ['filter' => 'loginFilter', 'namespace' => SECURITY_MODULE_NAMESPACE], function ($routes) {
        $routes->get('login', 'LoginController::loginForm');
        $routes->post('login', 'LoginController::loginAction');
    });

    $routes->get('logout', 'LoginController::logoutAction', ['namespace' => SECURITY_MODULE_NAMESPACE]);
}
