<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//首页
Route::get('/','HomeController@index');

//解决方案
Route::get('/sovle','HomeController@sovle');
Route::get('/sovle/sovle{articleId}.html','HomeController@sovle');

//产品展示
Route::get('/product','HomeController@product');
Route::get('/product/product{articleId}.html','HomeController@product');

//技术服务
Route::get('/service','HomeController@service');
Route::get('/service/service{articleId}.html','HomeController@service');

//关于我们
Route::get('/about','HomeController@about');
Route::get('/about/about{articleId}.html','HomeController@about');

//新闻中心
Route::get('/news','HomeController@news');
Route::get('/news/news{articleId}.html','HomeController@news');

