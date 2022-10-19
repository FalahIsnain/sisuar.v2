<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/', 'Home::index');
$routes->get('/BerandaSurat', 'BerandaSurat::index');
$routes->get('/Arsip', 'Arsip::index');
$routes->get('/Arsip/dashboardArsip', 'Arsip::dashboardArsip');
$routes->get('/SuratMasuk', 'SuratMasuk::index');
$routes->get('/SuratKeluar', 'SuratKeluar::index');
$routes->get('/SuratTugas', 'SuratTugas::index');
$routes->add('/SuratMasuk/(:any)', 'SuratMasuk::$1');
$routes->add('/SuratKeluar/(:any)', 'SuratKeluar::$1');
$routes->add('/SuratTugas/(:any)', 'SuratTugas::$1');
$routes->add('/BerandaSurat/(:any)', 'BerandaSurat::$1');
$routes->delete('/SuratMasuk/(:num)', 'SuratMasuk::hapusSuratMasuk/$1');
$routes->delete('/SuratKeluar/(:num)', 'SuratKeluar::hapusSuratKeluar/$1');
$routes->delete('/SuratTugas/(:num)', 'SuratTugas::hapusSuratTugas/$1');
$routes->add('/SuratMasuk/edit/(:any)', 'SuratMasuk::edit/$1');
$routes->add('/SuratKeluar/edit/(:any)', 'SuratKeluar::edit/$1');
$routes->add('/SuratTugas/edit/(:any)', 'SuratTugas::edit/$1');
$routes->add('/SuratMasuk/disposisi/(:any)', 'SuratMasuk::disposisi/$1');
$routes->get('/Arsip', 'Arsip::index');
$routes->add('/Arsip/(:any)', 'Arsip::$1');
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
