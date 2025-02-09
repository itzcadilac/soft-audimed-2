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
    $routes->group('usuarios', ['filter' => 'auth', 'namespace' => USER_MODULE_NAMESPACE], function ($routes) {
        $routes->get('nuevousuario', 'UserRegisterController::registerForm');
        $routes->post('registro', 'UserRegisterController::registerAction');
        $routes->get('valida/documento/(:any)/(:any)', 'ValidateDocumentController::getValidateDocumentAction/$1/$2');
        $routes->get('valida/nombreusuario/(:any)', 'ValidateUsernameController::getValidateUsernameAction/$1');
    });
}
