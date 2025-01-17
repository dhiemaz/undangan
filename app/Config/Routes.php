<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/invitation/(:any)', 'InvitationController::show/$1');
$routes->post('/invitation/confirm', 'InvitationController::confirm');
