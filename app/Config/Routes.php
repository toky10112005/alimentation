<?php
use CodeIgniter\Router\RouteCollection;

use App\Controllers\EtudiantController;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index'); 
// $routes->get('/', 'EtudiantController::index');
// $routes->get('/etudiant/(:num)','EtudiantController::show/$1');

$routes->get('/', 'User::index');
$routes->get('/accueil', 'User::accueil');
$routes->get('/profil', 'User::profil');
$routes->get('/objectifs', 'User::objectifs');
$routes->get('/regimes', 'User::regimes');
$routes->get('/activites', 'User::activites');
$routes->get('/paiement', 'User::paiement');
$routes->get('/export-pdf', 'User::exportPdf');
$routes->get('/redirectadmin', 'User::redirectadmin');
$routes->post('/user/login', 'User::login');
$routes->get('/user/redirectinscription', 'User::redirectinscription');
$routes->post('/user/inscription', 'User::page');
$routes->post('/user/put', 'User::put');


$routes->get('/admin/login', 'Admin::loginPage');
$routes->post('/admin/login', 'Admin::loginAdmin');
$routes->get('/admin/insert', 'Admin::insertredirect');
$routes->post('/admin/put', 'Admin::put');

$routes->get('/objectif', 'Regime::objectif');
$routes->get('/details/(:num)', 'Activite::details/$1');

$routes->group('admin', ['filter' => 'role:admin'], function($routes) {
    // Autres routes réservées aux administrateurs
    });
