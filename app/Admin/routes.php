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

    //图片上传
    $router->post('/article/ckeditorUploadImg', 'ArticleController@ckeditorUploadImg');

    //推荐位管理
    $router->get('/position', 'PositionController@index');
    $router->get('/position/create', 'PositionController@create');
    $router->post('/position/create', 'PositionController@create');
    $router->get('/position/{id}/edit', 'PositionController@edit');
    $router->post('/position/{id}/edit', 'PositionController@edit');

    //推荐资源管理
    $router->get('/recommend', 'RecommendController@index');
    $router->get('/recommend/create', 'RecommendController@create');
    $router->post('/recommend/create', 'RecommendController@create');
    $router->get('/recommend/{id}/edit', 'RecommendController@edit');
    $router->post('/recommend/{id}/edit', 'RecommendController@edit');
});
