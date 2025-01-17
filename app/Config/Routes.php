<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', function() {
    return redirect()->to('/login'); 
});

$routes->group('', ['filter' => 'loginFilter'], function($routes) {
    $routes->get('/login', 'LoginController::loginForm');
    $routes->post('/login', 'LoginController::login');
});

$routes->get('/logout', 'LoginController::logout');

$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', 'DashboardController::index');
    //$routes->get('usuario/perfil', 'UserController::perfil');
});

//Por el momento no necesitan filtro
$routes->group('usuario', function($routes) {
    $routes->get('index', 'RegistroUserController::index');
    $routes->post('registro', 'RegistroUserController::registroUsuario');
});

