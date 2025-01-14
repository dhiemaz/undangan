<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AttendanceController::index');
$routes->post('/attendance/confirm', 'AttendanceController::confirm');
$routes->post('/attendance/submit', 'AttendanceController::submit');
