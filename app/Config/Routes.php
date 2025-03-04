<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::attemptLogin');
$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::attemptRegister');
$routes->get('/logout', 'AuthController::logout');
$routes->get('/', 'AdminController::index');


// Admin Routes
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'AdminController::index');
    $routes->get('users', 'AdminController::users');
    $routes->get('laporan', 'AdminController::laporan');
});

// Dokter Routes
$routes->group('dokter', ['filter' => 'auth:dokter'], function ($routes) {
    $routes->get('/', 'DokterController::index');
    $routes->get('konsultasi', 'DokterController::konsultasi');
    $routes->post('resep', 'DokterController::kirimResep');
});

// Konsumen Routes
$routes->group('konsumen', function($routes) {
    $routes->get('/', 'KonsumenController::index');
    $routes->get('konsultasi', 'KonsumenController::konsultasi');
    $routes->post('konsultasi/simpan', 'KonsumenController::simpanKonsultasi');
    $routes->get('layanan', 'KonsumenController::layanan');
    $routes->get('produk', 'KonsumenController::produk');
    $routes->post('produk/beli', 'KonsumenController::beliProduk');
    $routes->get('transaksi', 'KonsumenController::transaksi');
});

$routes->group('admin', function($routes) {
    $routes->get('users', 'AdminController::users');
    $routes->get('createUser', 'AdminController::createUser');
    $routes->post('storeUser', 'AdminController::storeUser');
    $routes->get('editUser/(:num)', 'AdminController::editUser/$1');
    $routes->post('updateUser/(:num)', 'AdminController::updateUser/$1');
    $routes->get('deleteUser/(:num)', 'AdminController::deleteUser/$1');
});



