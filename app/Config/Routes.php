<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/register', 'AuthController::daftar');
$routes->post('/register', 'AuthController::daftar');
$routes->get('/login', 'AuthController::login');
$routes->post('/auth/authenticate', 'AuthController::authenticate');
