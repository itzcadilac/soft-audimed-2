<?php

namespace Modules\Users\Config;

use CodeIgniter\Router\RouteCollection;

const USER_MODULE_NAMESPACE = 'Modules\Users\Infrastructure\In\Controller';

/**
 * Define rutas específicas para el módulo de usuarios.
 *
 * @param RouteCollection $routes
 */

function UserRoutes(RouteCollection $routes)
{
    $routes->group('usuarios', ['namespace' => USER_MODULE_NAMESPACE], function ($routes) {
        $routes->get('nuevo', 'UserRegisterController::registerForm');
        $routes->post('registro', 'UserRegisterController::registerAction');
    });
}
