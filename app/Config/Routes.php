<?php

use CodeIgniter\Router\RouteCollection;

use App\Controllers\Special;
use App\Controllers\Couleurs;
use App\Controllers\DocumentController;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/testdb', [Special::class, 'databasetest']);

$routes->get('/document/list', [DocumentController::class, 'list']);
$routes->get('/document/display/(:segment)', [DocumentController::class, 'display']);
$routes->get('/document/edit/(:segment)', [DocumentController::class, 'edit']);
$routes->get('/document/create', [DocumentController::class, 'create']);
$routes->post('/document/save', [DocumentController::class, 'save']);
$routes->post('/document/delete', [DocumentController::class, 'delete']);

$routes->get('/variables/(:segment)', [Special::class, 'varie']);
$routes->get('/couleurs/create', [Couleurs::class, 'createColorForm']);
$routes->post('/couleurs/validate', [Couleurs::class, 'createColor']);
$routes->get('/couleurs/display/(:segment)', [Couleurs::class, 'seeColor']);
$routes->get('/couleurs/delete/(:segment)', [Couleurs::class, 'deleteColor']);
$routes->get('/couleurs/(:segment)/(:segment)', [Couleurs::class, 'themetest']);
