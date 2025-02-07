<?php

use Config\App;

include APPPATH . 'Modules/Users/Config/Routes.php';
include APPPATH . 'Modules/Security/Config/Routes.php';
include APPPATH . 'Modules/Notifications/Config/Routes.php';

use CodeIgniter\Router\RouteCollection;
use function Modules\Users\Config\UserRoutes;
use function Modules\Security\Config\SecurityRoutes;
use function Modules\Notifications\Config\NotificationsRoutes;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', function () {
    return redirect()->to('login');
});

$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('inicio', 'DashboardController::index');
});

$routes->group('siniestro', ['filter' => 'auth'], function ($routes) {
    $routes->get('pacientes', 'SiniestroController::pacientes');
    $routes->get('nuevoSiniestro', 'SiniestroController::nuevoSiniestro');
    $routes->get('getSiniestros', 'SiniestroController::getAllActiveSinistro');
});

$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('rrhh', 'RRHHController::index');
    $routes->post('saveEmployee', 'RRHHController::saveEmployee');
});

// Rutas modulares
SecurityRoutes($routes);
UserRoutes($routes);
NotificationsRoutes($routes);