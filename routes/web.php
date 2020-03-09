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

	// Configuracion / Estados
	Route::get('/estados/get-list', 'RegionController@getList')->name('estados-get-list');
	Route::get('/estados/by-country', 'RegionController@byCountry')->name('estados-by-pais');
	Route::resource('estados', 'RegionController');

	// Configuracion / Ciudades
	Route::get('/ciudades/get-list', 'CityController@getList')->name('ciudades-get-list');
	Route::get('/ciudades/by-region', 'CityController@byRegion')->name('ciudades-by-estado');
	Route::resource('ciudades', 'CityController');

	// Configuracion / Zonas
	Route::get('/zonas/get-list', 'ZoneController@getList')->name('zonas-get-list');
	Route::get('/zonas/by-city', 'ZoneController@byCity')->name('zonas-by-ciudad');
	Route::resource('zonas', 'ZoneController');

	// Configuracion / Monedas
	Route::get('/monedas/get-list', 'CoinController@getList')->name('monedas-get-list');
	Route::resource('monedas', 'CoinController');

	// Configuracion / Atributos
	Route::get('/atributos/get-list', 'AttributeController@getList')->name('atributos-get-list');
	Route::resource('atributos', 'AttributeController');
});

Route::get('/admin', 'HomeController@index')->name('home');

