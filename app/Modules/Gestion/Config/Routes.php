<?php

namespace Modules\Gestion\Config;

use CodeIgniter\Router\RouteCollection;

const GESTION_MODULE_NAMESPACE = 'Modules\Gestion\Infrastructure\In\Controller';

/**
 * Define rutas específicas para el módulo de usuarios.
 *
 * @param RouteCollection $routes
 */

function GestionRoutes(RouteCollection $routes)
{
    $routes->group('gestion', ['namespace' => GESTION_MODULE_NAMESPACE], function ($routes) {
        $routes->get('gperfiles', 'GetGestionController::getAllProfilesForm');
    });
}
