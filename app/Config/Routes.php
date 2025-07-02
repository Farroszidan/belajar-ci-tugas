<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// LOGIN
$routes->get('/', 'Home::index', ['filter' => 'auth']);
$routes->post('login', 'AuthController::login');
$routes->get('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');
$routes->get('produk', 'ProdukController::index', ['filter' => 'auth']);
$routes->get('keranjang', 'TransaksiController::index', ['filter' => 'auth']);

$routes->get('register', 'AuthController::register');
$routes->post('register', 'AuthController::processRegister');


// CRUD
$routes->group('produk', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'ProdukController::index');
    $routes->post('', 'ProdukController::create');
    $routes->post('edit/(:any)', 'ProdukController::edit/$1');
    $routes->get('delete/(:any)', 'ProdukController::delete/$1');
    $routes->get('download', 'ProdukController::download');
});

$routes->group('keranjang', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'TransaksiController::index');
    $routes->post('', 'TransaksiController::cart_add');
    $routes->post('edit', 'TransaksiController::cart_edit');
    $routes->get('delete/(:any)', 'TransaksiController::cart_delete/$1');
    $routes->get('clear', 'TransaksiController::cart_clear');
});
$routes->get('checkout', 'TransaksiController::checkout', ['filter' => 'auth']);

$routes->get('get-location', 'TransaksiController::getLocation', ['filter' => 'auth']);
$routes->get('get-cost', 'TransaksiController::getCost', ['filter' => 'auth']);
$routes->post('buy', 'TransaksiController::buy', ['filter' => 'auth']);

$routes->get('profile', 'Home::profile', ['filter' => 'auth']);

// API
$routes->resource('api', ['controller' => 'apiController']);
$routes->get('api', 'ApiController::index');

// Dashboard Toko
$routes->get('dashboard-toko', 'Dashboard::index', ['filter' => 'role:admin']);
$routes->get('dashboard-toko/cetak', 'Dashboard::exportPdf', ['filter' => 'role:admin']);
$routes->get('dashboard-toko/api', 'Dashboard::api', ['filter' => 'role:admin']); // ini belum ada method `api`, hati-hati
