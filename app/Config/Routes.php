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

$routes->get('/backstage/dashboard/tabs/overview', 'BackstageController::overview');
$routes->get('/backstage/dashboard/tabs/invitations', 'BackstageController::invitations');
$routes->get('/backstage/dashboard/tabs/guests', 'BackstageController::guests');
$routes->get('/backstage/dashboard/tabs/delegations', 'BackstageController::delegations');
$routes->get('/backstage/dashboard/tabs/check_in', 'BackstageController::checkIn');
$routes->get('/backstage/dashboard/tabs/manual_check_in', 'BackstageController::manualCheckIn');

// Backstage API
$routes->get('/backstage/api/getSummaryCount', 'BackstageController::getSummaryCount');
$routes->get('/backstage/api/getRecentActivities', 'BackstageController::getRecentActivities');
$routes->get('/backstage/api/getUpdatedInvitations', 'BackstageController::getUpdatedInvitations');
$routes->get('/backstage/api/getAllInvitations', 'BackstageController::getAllInvitations');
$routes->get('/backstage/api/getInvitationGuests', 'BackstageController::getInvitationGuests');
$routes->get('/backstage/api/getInvitationDelegation', 'BackstageController::getInvitationDelegation');
$routes->get('/backstage/api/getInvitationData/(:any)', 'BackstageController::getInvitationData/$1');
$routes->get('/backstage/api/invitations/search', 'BackstageController::searchInvitations');
$routes->get('/backstage/api/invitations/guests-search', 'BackstageController::searchGuests');
$routes->post('/backstage/api/invitations/checkIn', 'BackstageController::invitationCheckIn');
$routes->post('/backstage/api/invitations/registrationAndCheckIn', 'BackstageController::invitationRegistrationAndCheckIn');
$routes->get('/backstage/api/invitations/eventChart', 'BackstageController::getEventChart');
$routes->post('/backstage/api/invitations/guestCheckIn', 'BackstageController::guestCheckIn');
$routes->get('/backstage/api/invitations/delegations-search', 'BackstageController::searchDelegations');
$routes->post('/backstage/api/invitations/delegationCheckIn', 'BackstageController::delegationCheckIn');