<?php

namespace Modules\Accidentado\Config;

use CodeIgniter\Router\RouteCollection;

const ACCIDENTADO_MODULE_NAMESPACE = 'Modules\Accidentado\Infrastructure\In\Controller';

/**
 * Define rutas específicas de las opciones para gestionar accidentados.
 *
 * @param RouteCollection $routes
 */

function AccidentadoRoutes(RouteCollection $routes)
{
    $routes->group('accidentados', ['filter' => 'auth', 'namespace' => ACCIDENTADO_MODULE_NAMESPACE], function ($routes) {
       $routes->get('listaccidentados/(:any)', 'GetAccidentadoController::getAccidentadosForm/$1');
       $routes->get('caccidentado/(:any)', 'GetAccidentadoController::getDetailConForm/$1');
       $routes->get('maccidentado/(:any)', 'GetAccidentadoController::getDetailModForm/$1');
    });
}
