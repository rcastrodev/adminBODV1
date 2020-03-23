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



Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function() {
	// Marcas
	Route::get('/marcas/get-list', 'BrandController@getList')->name('marcas-get-list');
	Route::resource('marcas', 'BrandController')->except(['destroy']);

	// Descuento estacional en el establecimiento
	Route::put('/establecimientos/save-seasonal-discount/update', 'EstablishmentController@saveSeasonalDiscount');
	// Eliminar descuento estacional en el establecimiento
	Route::delete('/establecimientos/delete-seasonal-discount/{id}', 'EstablishmentController@deleteSeasonalDiscount');

	// Descuento por tenedores
	Route::post('/establecimientos/maximum-number-of-forks/update', 'EstablishmentController@updateMaximumNumberOfForks');

	// Horario de apertura
	Route::post('/establecimientos/opening-hours/update', 'EstablishmentController@updateOpeningHours');

	// Eliminar horario de apertura
	Route::delete('/establecimientos/opening-hours/delete/{id}', 'EstablishmentController@deleteOpeningHours');

	// Descuento por cantidad de personas
	Route::post('/establecimientos/discount-for-quantity-of-people', 'EstablishmentController@saveDiscountForQuantityOfPeople');
	// Eliminar registro de descuento por persona
	Route::delete('/establecimientos/delete-discount-for-quantity-of-people/{id}', 'EstablishmentController@deleteDiscountForQuantityOfPeople');

	//Galeria establecimiento
	Route::post('/establecimientos/save-gallery-of-establishment', 'EstablishmentGalleryController@store');

	//Eliminar imágen de la galeria establecimiento
	Route::delete('/establecimientos/delete-gallery-of-establishment/{id}', 'EstablishmentGalleryController@destroy');

	// Establecimientos
	Route::get('/establecimientos/get-list', 'EstablishmentController@getList')->name('establishment-get-list');

	// Establecimientos
	Route::post('/establishment/coordenadas', 'EstablishmentController@coordenadas');
	
	// Establecimeintos
	Route::resource('establecimientos', 'EstablishmentController');

	


	// Configuracion / Paises
	Route::get('/paises/get-list', 'CountryController@getList')->name('paises-get-list');
	Route::resource('paises', 'CountryController');

	// Configuracion 	/ Estados
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


	// Seccion de productos
	// Configuracion / productos
	Route::get('/productos/get-list', 'ProductController@getList')->name('productos-get-list');
	Route::resource('productos', 'ProductController');

	// Reservas
	Route::get('/reservas/get-list', 'Reservations@getList')->name('reservas-get-list');
	Route::resource('reservas', 'ReservationsController');

	Route::get('/', 'HomeController@index')->name('home');

});

Route::get('/', 'PublicController@index')->name('public');
Route::get('/ofertas-gastronomicas', 'OfertasGastronomicasController@index')->name('ofertas-gastronomicas');
Route::get('/producto', 'OfertasGastronomicasController@producto')->name('producto');
Route::get('/establecimientos/{idPais}/{idCiudad}/', 'APIController@getEstablishments');

