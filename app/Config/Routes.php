<?php namespace Config;

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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', '\App\Controllers\Home::index');
$routes->get('/site-map', '\App\Controllers\Home::siteMap');
$routes->get('/help', '\App\Controllers\Home::help');
$routes->get('/contact', '\App\Controllers\Home::contact');
$routes->get('/about-us', '\App\Controllers\Home::aboutUs');
$routes->get('/logout', '\App\Controllers\Auth::logout');

$routes->get('/admin', '\App\Controllers\Admin\Dashboard::index');
$routes->get('/admin/form-data', function () {
	return redirect()->to(base_url('/admin'));
});
$routes->get('/admin/form-data/biodata-responden', '\App\Controllers\Admin\FormData::biodataResponden');
$routes->get('/admin/form-data/biodata-responden/create', '\App\Controllers\Admin\FormData::biodataRespondenCreate');
$routes->get('/admin/form-data/biodata-responden/(.*)/(.*)', '\App\Controllers\Admin\FormData::biodataResponden/$1/$2');
$routes->get('/admin/form-data/list-user', '\App\Controllers\Admin\FormData::listUser');
$routes->get('/admin/form-kuisioner', function () {
	return redirect()->to(base_url('/admin'));
});
$routes->get('/admin/form-kuisioner/soal', '\App\Controllers\Admin\FormKuisioner::soal');
$routes->get('/admin/form-kuisioner/data', '\App\Controllers\Admin\FormKuisioner::data');
$routes->get('/admin/form-kuisioner/data/create', '\App\Controllers\Admin\FormKuisioner::dataCreate');
$routes->get('/admin/form-kuisioner/data/(.*)', '\App\Controllers\Admin\FormKuisioner::data/$1');

$routes->get('/responden', '\App\Controllers\Responden\Dashboard::index');
$routes->get('/responden/form-kuisioner', '\App\Controllers\Responden\FormKuisioner::index');

$routes->get('/kuisioner/(.*)/(.*)', '\App\Controllers\Admin\FormKuisioner::export/$1/$2');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
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
