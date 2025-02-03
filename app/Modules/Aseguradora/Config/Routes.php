<?php

namespace Modules\Aseguradora\Config;

use CodeIgniter\Router\RouteCollection;

const ASEG_MODULE_NAMESPACE = 'Modules\Aseguradora\Infrastructure\In\Controller';

/**
 * Define rutas específicas para el módulo de usuarios.
 *
 * @param RouteCollection $routes
 */

function AseguradoraRoutes(RouteCollection $routes)
{
    $routes->group('aseguradora', ['namespace' => ASEG_MODULE_NAMESPACE], function ($routes) {
        $routes->get('getAsegxUser', 'AseguradoraController::getAseguradoraxUser');
        $routes->get('getTest', 'AseguradoraController::getTest');
        //$routes->post('registro', 'UserRegisterController::registerAction');
    });
}
