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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/redirect', 'AuthFacebookController@redirect');
Route::get('/callback', 'AuthFacebookController@callback');
Route::get('/products', 'ProductController@index')->name('products');
Route::get('/products/{product}/auction', 'ProductController@auction')->name('products.auction');
Route::post('products/{product}/bid', 'ProductController@bid')->name('products.bid');
