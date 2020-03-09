<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Country;
use App\City;
use App\Region;
use App\Zone;
use App\Gastronomy;
use App\Type;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        // Crear Roles

        $role = new Role();
        $role->role = 'Súper Administrador';
        $role->save();

		$role = new Role();
        $role->role = 'Administrador de Contenido';
        $role->save();

		$role = new Role();
        $role->role = 'Aliado';
        $role->save();

        // Crear usuario admin

    	$user = new User();
    	$user->name  	= 'Admin';
    	$user->email  	= 'admin@admin.com';
    	$user->password = Hash::make('1234');
    	$user->role_id  = 1;
    	$user->save();


    	// Crear Paises

        $country = new Country();
        $country->name = 'Colombia';
        $country->iso = 'COL';
        $country->utc = 'UTC-5';
        $country->save();

        $country = new Country();
        $country->name = 'Venezuela';
        $country->iso = 'VEN';
        $country->utc = 'UTC-4';
        $country->save();

        // Crear Regiones

        $region = new Region();
        $region->country_id    = 2;
        $region->region        = 'Distrito Capital';
        $region->save();

        $region = new Region();
        $region->country_id    = 2;
        $region->region        = 'Zulia';
        $region->save();

        $region = new Region();
        $region->country_id    = 2;
        $region->region        = 'Carabobo';
        $region->save();


        // Crear Ciudades

        $city = new City();
        $city->region_id    = 1;
        $city->city 		= 'Caracas';
        $city->save();

        $city = new City();
        $city->region_id    = 3;
        $city->city 		= 'Valencia';
        $city->save();

        $city = new City();
        $city->region_id    = 2;
        $city->city 		= 'Maracaibo';
        $city->save();

        // Crear Zonas

        $zone = new Zone();
        $zone->city_id      = 1;
        $zone->zone         = 'Artigas';
        $zone->save();

        $zone = new Zone();
        $zone->city_id      = 1;
        $zone->zone         = 'Los Palos Grandes';
        $zone->save();

        $zone = new Zone();
        $zone->city_id      = 1;
        $zone->zone         = 'Plaza Vzla';
        $zone->save();


        // Crear Gastronomia

        $type           = new Type();
        $type->name     =  'Se prendio la rumba';
        $type->value    = 'lo que nos pueda colaborar';
        $type->category = 'Evento';
        $type->save();

        $type             = new Type();
        $type->name       = 'Pasa un dia diferente';
        $type->value        = 'lo que nos pueda colaborar';
        $type->category   = 'Evento';
        $type->save();

        $type           = new Type();
        $type->name     = 'Ron';
        $type->value    = 'lo que nos pueda colaborar';
        $type->category = 'Evento';
        $type->save();

        $type           = new Type();
        $type->name     = 'Cerveza';
        $type->value    = 'lo que nos pueda colaborar';
        $type->category = 'Producto';
        $type->save();
    }
}
