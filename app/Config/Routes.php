<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
    setlocale(LC_TIME, 'IND');
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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Auth::signin');

$routes->get('login', 'Auth::signin');
$routes->post('login', 'Auth::authsignin');

$routes->get('registrasi', 'Auth::signup');
$routes->get('verify/(:segment)', 'Auth::validasi_regis/$1');
$routes->post('register', 'Auth::storesignup');


$routes->get('logout', 'Auth::logout');
// Dashboard
$routes->get('dashboard', 'RoleController::index');
$routes->group('dashboard', static function ($routes) {

    // Admin
    $routes->get('admin', 'Dashboard::index', ['namespace' => '\App\Controllers\Admin']);
    $routes->group('admin', ['namespace' => '\App\Controllers\Admin'], static function ($routes) {
        // jenis TO
        $routes->get('jenis_try_out', 'JenisTo::index');
        $routes->post('tambah_TryOut', 'JenisTo::tambah_TryOut');
        $routes->get('edit_jenis_try_out/(:segment)', 'JenisTo::edit_TryOut/$1');
        $routes->get('hapus_jenis_try_out/(:segment)', 'JenisTo::hapus_TryOut/$1');
        $routes->post('update_jenis_try_out/(:segment)', 'JenisTo::update_TryOut/$1');
        // End Jenis To

        // paket to
        $routes->get('paket_try_out', 'PaketTo::index');
        $routes->post('tambah_paket_tryout', 'PaketTo::tambahpaketTryOut');
        $routes->get('edit_paket_try_out/(:segment)', 'PaketTo::editpaketTryOut/$1');
        $routes->get('hapus_paket_try_out/(:segment)', 'PaketTo::hapuspaketTryOut/$1');
        $routes->post('update_paket_try_out/(:segment)', 'PaketTo::updatepaketTryOut/$1');


        // soal to
        $routes->get('detail_paket/(:segment)', 'PaketTo::detail_paket/$1');
        $routes->post('tambah_soal', 'PaketTo::tambah_soal');
        $routes->get('edit_soal/(:segment)/(:segment)', 'PaketTo::edit_soal/$1/$2');
        $routes->get('hapus_soal/(:segment)/(:segment)', 'PaketTo::hapus_soal/$1/$2');
        $routes->post('update_soal/(:segment)/(:segment)', 'PaketTo::update_soal/$1/$2');

        // jadwal
        $routes->get('jadwal', 'Jadwal::index');
        $routes->post('tambah_jadwal', 'Jadwal::tambah_jadwal');
        $routes->get('edit_jadwal_try_out/(:segment)', 'Jadwal::editjadwalTryOut/$1');
        $routes->post('update_jadwal_try_out/(:segment)', 'Jadwal::updatejadwalTryOut/$1');
        $routes->get('hapus_jadwal_try_out/(:segment)', 'Jadwal::hapusjadwalTryOut/$1');
        $routes->get('detail_jadwal_try_out/(:segment)', 'Jadwal::detailjadwalTryOut/$1');



        // Valiidasi
        $routes->get('validasi', 'Validasi::index');
        $routes->get('validasi/paket/(:segment)', 'Validasi::data_paket/$1');
        $routes->get('validasi/paket/status/(:segment)', 'Validasi::data_status/$1');
        $routes->get('validasi/pembayaran/(:segment)/(:segment)/(:segment)', 'Validasi::data_pembayaran/$1/$2/$3');
        $routes->get('validasi/diverifikasi/(:segment)', 'Validasi::verifikasi_pembayaran/$1');
        $routes->get('validasi/detail_pembayaran/(:segment)', 'Validasi::detail_pembayaran/$1');

        // profile
        $routes->get('profile', 'Profile::index');
    });
    // ENd Admin

});

$routes->group('dashboard', static function ($routes) {

    // Admin
    $routes->get('user', 'Dashboard::index', ['namespace' => '\App\Controllers\User']);
    $routes->group('user', ['namespace' => '\App\Controllers\User'], static function ($routes) {
        // jadwal
        $routes->get('jadwal', 'Jadwal::index');
        $routes->get('detail_jadwal/(:segment)', 'Jadwal::detail_jadwal/$1');

        // pembayaran
        $routes->get('daftar/(:segment)/(:segment)/(:segment)', 'Pembayaran::pembayaran/$1/$2/$3');
        $routes->get('pembayaran', 'Pembayaran::index');
        $routes->get('detail_pembayaran/(:segment)/(:segment)', 'Pembayaran::detail_pembayaran/$1/$2');

        // pengerjaan
        $routes->get('pengerjaan/(:segment)/(:segment)', 'Pengerjaan::pengerjaan/$1/$2');
        $routes->post('selesai_pengerjaan', 'Pengerjaan::selesai_pengerjaan');

        // profile
        $routes->get('profile', 'Profile::index');
    });
    // ENd Admin

});

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
