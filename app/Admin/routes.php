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
    $router->post('/category/create', 'CategoryController@create');
    $router->get('/category/{id}/edit', 'CategoryController@edit');
    $router->post('/category/{id}/edit', 'CategoryController@edit');

    //文章管理
    $router->get('/article', 'ArticleController@index');
    $router->get('/article/create', 'ArticleController@create');
    $router->post('/article/create', 'ArticleController@create');
    $router->get('/article/{id}/edit', 'ArticleController@edit');
    $router->post('/article/{id}/edit', 'ArticleController@edit');

});
