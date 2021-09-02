<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/Admin/Fakultas', 'Admin/Fakultas::index');
$routes->get('/Admin/Fakultas/(:any)', 'Admin/Fakultas::index');
$routes->post('/Admin/Fakultas', 'Admin/Fakultas::addFakultas');

$routes->get('/Admin/Jurusan', 'Admin/Jurusan::index');
$routes->get('/Admin/Jurusan/(:any)', 'Admin/Jurusan::index');
$routes->post('/Admin/Jurusan', 'Admin/Jurusan::addJurusan');
$routes->delete('/Admin/Jurusan/(:any)', 'Admin/Jurusan::deleteJurusan/$1');
$routes->put('/Admin/Jurusan/(:any)', 'Admin/Jurusan::editJurusan/$1');

$routes->get('/Admin/Matakuliah', 'Admin/Matakuliah::index');
$routes->get('/Admin/Matakuliah/(:any)', 'Admin/Matakuliah::index');
$routes->post('/Admin/Matakuliah', 'Admin/Matakuliah::addMatakuliah');
$routes->delete('/Admin/Matakuliah/(:any)', 'Admin/Matakuliah::deleteMatakuliah/$1');
$routes->put('/Admin/Matakuliah/(:any)', 'Admin/Matakuliah::editMatakuliah/$1');

$routes->get('/Admin/Dosen', 'Admin/Dosen::index');
$routes->get('/Admin/Dosen/(:any)', 'Admin/Dosen::index');
$routes->post('/Admin/Dosen', 'Admin/Dosen::addDosen');
$routes->delete('/Admin/Dosen/(:any)', 'Admin/Dosen::deleteDosen/$1');
$routes->put('/Admin/Dosen/(:any)', 'Admin/Dosen::editDosen/$1');

$routes->get('/Admin/Mahasiswa', 'Admin/Mahasiswa::index');
$routes->get('/Admin/Mahasiswa/(:any)', 'Admin/Mahasiswa::index');
$routes->post('/Admin/Mahasiswa', 'Admin/Mahasiswa::addMahasiswa');
$routes->delete('/Admin/Mahasiswa/(:any)', 'Admin/Mahasiswa::deleteMahasiswa/$1');
$routes->put('/Admin/Mahasiswa/(:any)', 'Admin/Mahasiswa::editMahasiswa/$1');

$routes->post('/Admin/QueryData', 'Admin/QueryData::prosesQuery');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
