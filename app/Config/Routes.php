<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;
use App\Controllers\MahasiswaProgramController;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'mahasiswa::index');
$routes->get('/mahasiswa', 'Mahasiswa::index');
$routes->get('/mahasiswa/create', 'Mahasiswa::create');
$routes->post('/mahasiswa/store', 'Mahasiswa::store');
$routes->get('/mahasiswa/edit/(:num)', 'Mahasiswa::edit/$1');
$routes->post('/mahasiswa/update/(:num)', 'Mahasiswa::update/$1');
$routes->post('/mahasiswa/delete/(:num)', 'Mahasiswa::delete/$1');
$routes->get('/program_studi', 'ProgramStudi::index');
$routes->get('/program_studi/create', 'ProgramStudi::create');
$routes->post('/program_studi/store', 'ProgramStudi::store');
$routes->get('/program_studi/edit/(:num)', 'ProgramStudi::edit/$1');
$routes->post('/program_studi/update/(:num)', 'ProgramStudi::update/$1');
$routes->post('/program_studi/delete/(:num)', 'ProgramStudi::delete/$1');


