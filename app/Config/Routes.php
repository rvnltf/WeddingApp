<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
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
$routes->get('/admin', 'Admin::index');
$routes->delete('/admin/dltwg/(:num)', 'Admin::deleteWeddingGift/$1');
$routes->get('/admin/dtwg/(:segment)', 'Admin::wedding_gift/$1');
$routes->delete('/admin/dltrngt/(:num)', 'Admin::deleteOrangtua/$1');
$routes->get('/admin/dtrngt/(:segment)', 'Admin::orangtua/$1');
$routes->delete('/admin/dltcpn/(:num)', 'Admin::deleteUcapan/$1');
$routes->get('/admin/dtcpn/(:segment)', 'Admin::ucapan/$1');
$routes->delete('/admin/dltgllry/(:num)', 'Admin::deleteGallery/$1');
$routes->get('/admin/dtgllry/(:segment)', 'Admin::gallery/$1');
$routes->delete('/admin/dlttmln/(:num)', 'Admin::deleteTimeline/$1');
$routes->get('/admin/dttmln/(:segment)', 'Admin::timeline/$1');
$routes->delete('/admin/dltdtndngn/(:num)', 'Admin::deleteDataUndangan/$1');
$routes->get('/admin/dtdtndngn/(:segment)', 'Admin::tambahDataUndangan/$1');
$routes->delete('/admin/dltbckgrnd/(:num)', 'Admin::deleteBackground/$1');
$routes->get('/admin/dtbckgrnd/(:segment)', 'Admin::background/$1');
$routes->delete('/admin/dltbkndngn/(:num)', 'Admin::deleteBukuUndangan/$1');
$routes->get('/admin/dtbkndngn/(:segment)', 'Admin::buku_undangan/$1');
$routes->delete('/admin/dltpsn/(:num)', 'Admin::deletePesan/$1');
$routes->get('/admin/dtpsn/(:segment)', 'Admin::pesan/$1');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}