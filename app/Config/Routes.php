<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();
$session = Services::session();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Index');
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
$routes->get('/', 'Index::index');

$routes->post('/doLogin', 'Index::doLogin');

$routes->get('/logout', 'Index::logout');

$routes->get('/dashboard', 'Index::dashboard');

$routes->get('/mahasiswa', 'Index::mahasiswa');
if ($session->get('exceptMahasiswa')) {
    $akun = $session->get('exceptMahasiswa');
    if ($akun[0]['level'] == 0) {
        $routes->post('/mahasiswa/tambah', 'Index::tambah');
    }
}

$routes->post('/mahasiswa/hapus', 'Index::hapus');

if (!$session->get('exceptMahasiswa')) {
    $routes->get('/dokumen', 'Dokumen::index');

    $routes->post('/dokumen/tambah', 'Dokumen::tambah');

    $routes->post('/dokumen/hapus', 'Dokumen::hapus');
}

$routes->get('/dokumen/(:num)', 'Dokumen::viewFile/$1');

if ($session->get('exceptMahasiswa')) {
    $akun = $session->get('exceptMahasiswa');

    if ($akun[0]['level'] == 0) {
        $routes->get('/dosen', 'Dosen::index');

        $routes->post('/dosen/tambah', 'Dosen::tambah');

        $routes->post('/dosen/ubah', 'Dosen::ubah');

        $routes->post('/dosen/hapus', 'Dosen::hapus');
    }
}
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
