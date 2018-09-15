<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    $router->get('/news', 'NewsController@index');
    $router->get('/news/create', 'NewsController@create');
    $router->post('/news/create', 'NewsController@create');
    $router->get('/news/{id}/edit', 'NewsController@edit');

    //栏目分类
   $router->get('/category', 'CategoryController@index');
    $router->get('/category/create', 'CategoryController@create');
    $router->get('/category/{id}/edit', 'CategoryController@edit');

});
