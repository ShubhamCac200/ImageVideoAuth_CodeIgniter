<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/register', 'Auth::register');
$routes->post('/register/store', 'Auth::store');
$routes->get('/login', 'Auth::login');
$routes->post('/login/authenticate', 'Auth::authenticate');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/logout', 'Auth::logout');
$routes->get('/profile', 'Profile::index');
$routes->post('/profile/update', 'Profile::update');
$routes->post('/profile/change-password', 'Profile::changePassword');

$routes->get('/search', 'Search::index');
$routes->post('/search/fetch', 'Search::fetch');

