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
        $routes->get('detalle/(:any)', 'GetUserController::getDetailForm/$1');
        $routes->post('registro', 'UserRegisterController::registerAction');
        $routes->get('valida/documento/(:any)/(:any)', 'ValidateDocumentController::getValidateDocumentAction/$1/$2');
        $routes->get('valida/nombreusuario/(:any)', 'ValidateUsernameController::getValidateUsernameAction/$1');
        $routes->get('listausuarios', 'GetUserController::getAllUsersForm');
        $routes->get('movusuario/(:any)', 'GetUserController::getMovemenstDetailForm/$1');
        $routes->get('auditusuario/(:any)', 'GetUserController::getAuditoryDetailForm/$1');
        $routes->get('resetpasswd/(:any)', 'UserRegisterController::resetPasswordAction/$1');
        $routes->get('detailmodusuario/(:any)', 'GetUserController::getDetailModForm/$1');
    });
}
