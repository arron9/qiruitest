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
Route::get('/solve.html','HomeController@solve');
Route::get('/solve/solve{id}.html','HomeController@solve');
Route::get('/solve/s{id}.html','HomeController@solve');

//产品展示
Route::get('/product.html','HomeController@product');
Route::get('/product/product{id}.html','HomeController@product');
Route::get('/product/type{id}.html','HomeController@product');
Route::get('/product/detail{id}.html','HomeController@product');

//技术服务
Route::get('/service.html','HomeController@service');
Route::get('/service/service{id}.html','HomeController@service');

//关于我们
Route::get('/about.html','HomeController@about');
Route::get('/about/about{id}.html','HomeController@about');

//新闻中心
Route::get('/news.html','HomeController@news');
Route::get('/news/news{id}.html','HomeController@news');
Route::get('/news/detail{id}.html','HomeController@news');

