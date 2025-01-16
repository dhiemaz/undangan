<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');
$routes->get('/invitation/(:any)', 'HomeController::index');
$routes->post('/invitation/confirm/(:any)', 'InvitationController::confirm/$1');
