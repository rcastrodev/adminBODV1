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

Route::get('/', 'PublicController@index')->name('public');
Route::get('/ofertas-gastronomicas', 'OfertasGastronomicasController@index')->name('ofertas-gastronomicas');

Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function() {
	// Marcas
	Route::get('/marcas/get-list', 'BrandController@getList')->name('marcas-get-list');
	Route::resource('marcas', 'BrandController');

	// Establecimeintos
	Route::resource('establecimientos', 'EstablishmentController');

	// Configuracion / Paises
	Route::get('/paises/get-list', 'CountryController@getList')->name('paises-get-list');
	Route::resource('paises', 'CountryController');
});

Route::get('/admin', 'HomeController@index')->name('home');

