<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Country;
use App\City;

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
        $country->country = 'Colombia';
        $country->save();

        $country = new Country();
        $country->country = 'Venezuela';
        $country->save();


        // Crear Ciudades

        $city = new City();
        $city->country_id 	= 2;
        $city->city 		= 'Caracas';
        $city->save();

        $city = new City();
        $city->country_id 	= 2;
        $city->city 		= 'Valencia';
        $city->save();

        $city = new City();
        $city->country_id 	= 2;
        $city->city 		= 'Maracaibo';
        $city->save();
    }
}
