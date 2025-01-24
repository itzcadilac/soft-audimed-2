<?php

use CodeIgniter\Router\RouteCollection;
use Config\Services;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', function() {
    return redirect()->to('login'); 
});

$routes->group('', ['filter' => 'loginFilter'], function($routes) {
    $routes->get('login', 'LoginController::loginForm');
    $routes->post('login', 'LoginController::login');
});

$routes->get('logout', 'LoginController::logout');

$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('inicio', 'DashboardController::index');
});

$routes->group('siniestro', ['filter' => 'auth'], function($routes) {
    $routes->get('pacientes', 'SiniestroController::pacientes');
    $routes->get('nuevoSiniestro', 'SiniestroController::nuevoSiniestro');
    $routes->get('getSiniestros', 'SiniestroController::getAllActiveSinistro');
});

$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('rrhh', 'RRHHController::index');
    $routes->post('saveEmployee', 'RRHHController::saveEmployee');
});

//Por el momento no necesitan filtro
$routes->group('usuario', function($routes) {
    $routes->get('index', 'RegistroUserController::index');
    $routes->post('registro', 'RegistroUserController::registroUsuario');
    $routes->get('getUsers', 'RegistroUserController::getAllActiveUsers');
});

//$routes->set404Override('ErrorsController::show404');
//$routes->set500Override('ErrorsController::show500');

