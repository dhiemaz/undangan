<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/invitation/(:any)', 'InvitationController::show/$1');
$routes->post('/invitation/confirm', 'InvitationController::confirm');

// Backstage
$routes->get('/backstage', 'BackstageController::index');
$routes->get('/backstage/dashboard', 'BackstageController::dashboard');
$routes->post('/backstage/login/authenticate', 'LoginController::authenticate');
$routes->get('/backstage/logout', 'LoginController::logout');

// Backstage API
$routes->get('/backstage/api/getSummaryCount', 'BackstageController::getSummaryCount');
$routes->get('/backstage/api/getRecentActivities', 'BackstageController::getRecentActivities');
$routes->get('/backstage/api/getUpdatedInvitations', 'BackstageController::getUpdatedInvitations');