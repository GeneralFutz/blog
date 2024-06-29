<?php

/**
 * @var CodeIgniter\Router\RouteCollection $routes
 */
$routes->get('assets/(:any)', '\Varyona\Controllers\AssetController::serve/$1');
