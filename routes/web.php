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

Route::get('/public', 'PublicController@index')->name('public');

Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function() {
	// Marcas
	Route::get('/marcas/get-list', 'BrandController@getList')->name('marcas-get-list');
	Route::resource('marcas', 'BrandController');

	// Establecimeintos
	Route::resource('establecimientos', 'EstablishmentController');
});

Route::get('/admin', 'HomeController@index')->name('home');

