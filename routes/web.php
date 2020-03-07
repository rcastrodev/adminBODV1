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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function() {
	Route::resource('establecimientos', 'EstablishmentController');

	// Marcas
	Route::get('/marcas/get-list', 'BrandController@getList')->name('marcas-get-list');
	Route::resource('marcas', 'BrandController');
});

Route::get('/admin', 'HomeController@index')->name('home');

