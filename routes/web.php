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

//Auth::routes();
// Authentication Routes...
Route::get('login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('login', [
    'as' => '',
    'uses' => 'Auth\LoginController@login'
]);
Route::post('logout', [
    'as' => 'logout',
    'uses' => 'Auth\LoginController@logout'
]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/redirect', 'AuthFacebookController@redirect')->name('redirect');
Route::get('/callback', 'AuthFacebookController@callback');
Route::get('/bids', 'BidController@index')->name('bids');
Route::get('/products', 'ProductController@index')->name('products');
Route::get('/products/{product}/auction', 'ProductController@auction')->name('products.auction');
Route::post('products/{product}/bid', 'ProductController@bid')->name('products.bid');
