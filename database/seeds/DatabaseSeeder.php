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
use App\Coin;

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

        $region             = new Region();
        $region->country_id = 2;
        $region->name       = 'Distrito Capital';
        $region->code       = '01';
        $region->save();

        $region             = new Region();
        $region->country_id = 2;
        $region->name       = 'Zulia';
        $region->code       = '02';
        $region->save();

        $region             = new Region();
        $region->country_id = 2;
        $region->name       = 'Carabobo';
        $region->code       = '03';
        $region->save();


        // Crear Ciudades

        $city = new City();
        $city->region_id  = 1;
        $city->country_id = 2;
        $city->name       = 'Caracas';
        $city->code 	  = '0001';
        $city->save();

        $city = new City();
        $city->region_id  = 3;
        $city->country_id = 2;
        $city->name       = 'Valencia';
        $city->code 	  = '0002';
        $city->save();

        $city = new City();
        $city->region_id  = 2;
        $city->country_id = 2;
        $city->name       = 'Maracaibo';
        $city->code 	  = '0003';
        $city->save();

        // Crear Zonas

        $zone = new Zone();
        $zone->city_id      = 1;
        $zone->name         = 'Artigas';
        $zone->code         = '0001';
        $zone->save();

        $zone = new Zone();
        $zone->city_id      = 1;
        $zone->name         = 'Los Palos Grandes';
        $zone->code         = '0002';
        $zone->save();

        $zone = new Zone();
        $zone->city_id      = 1;
        $zone->name         = 'Plaza Vzla';
        $zone->code         = '0003';
        $zone->save();


        // Crear Moneda

        $coin            = new Coin();
        $coin->name      = 'Bolivar Soberano';
        $coin->shortname = 'Bolivares';
        $coin->symbol  = 'Bs.S';
        $coin->save();


        // Crear tipos

        $type            = new Type();
        $type->name      = 'Italiana';
        $type->category  = 'Gastronomia';
        $type->save();

        $type            = new Type();
        $type->name      = 'China';
        $type->category  = 'Gastronomia';
        $type->save();

        $type            = new Type();
        $type->name      = 'Venezolana';
        $type->category  = 'Gastronomia';
        $type->save();

        $type            = new Type();
        $type->name      = 'Japonesa';
        $type->category  = 'Gastronomia';
        $type->save();
    }
}
