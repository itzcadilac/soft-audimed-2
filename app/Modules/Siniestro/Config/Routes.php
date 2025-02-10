<?php
namespace Modules\Siniestro\Config;

use CodeIgniter\Router\RouteCollection;

const Siniestro_MODULE_NAMESPACE = 'Modules\Siniestro\Infrastructure\In\Controller';

function SiniestroRoutes(RouteCollection $routes)
{
    $routes->group(strtolower('Siniestro'), ['filter' => 'auth', 'namespace' => Siniestro_MODULE_NAMESPACE], function ($routes) {
        $routes->get('/', 'SiniestroController::index');
        $routes->get('(:num)', 'SiniestroController::show/$1');
        $routes->post('/', 'SiniestroController::store');
        $routes->put('(:num)', 'SiniestroController::update/$1');
        $routes->delete('(:num)', 'SiniestroController::delete/$1');
        $routes->get('aseguradorasxuser', 'SiniestroController::getAseguradoraxUser');
        $routes->post('setAseguradora', 'SiniestroController::setAseguradora');
        $routes->post('setProducto', 'SiniestroController::setProducto');
    });
}

