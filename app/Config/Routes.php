<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/*
 * Front End Routes
 */

$routes->get('/', 'Front\Home::index');

$routes->get('blog', 'Front\FeedController::index');
$routes->get('blog/post/(:any)', 'Front\FeedController::single/$1');

/*
 * Admin Routes
 */

$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], static function ($routes) {


    $routes->group('posts', static function ($routes) {

        $routes->get('/', 'PostController::list');
        $routes->match(['GET', 'POST'], 'create', 'PostController::create');
        $routes->get('edit/(:num)', 'PostController::edit/$1');
        $routes->post('update/(:num)', 'PostController::update/$1');

        $routes->post('upload-image', 'PostController::uploadImage');
    });
});
/**
 * Auth Routes
 */
