<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Establishment;

$factory->define(Establishment::class, function (Faker $faker) {
    return [
        'user_id' 			=> 1,
        'brand_id' 			=> 1,
        'status'			=> true,
        'type_id' 			=> 1,
        'country_id'		=> 2,
        'region_id' 		=> 1,
        'city_id' 			=> 1,
        'zone_id' 			=> 2,
        'name' 				=> $faker->company,
        'owner_name' 		=> $faker->name,
        'rif'				=> Str::random(15),
        'address'			=> $faker->address,
        'phone' 			=> $faker->phoneNumber,
        'reservation_email'	=> $faker->unique()->safeEmail,
        'logo'				=> $faker->imageUrl(1081, 1081),
        'main_image'		=> $faker->imageUrl(1081, 1081),
        'publish_on_the_web'=> 1,
        'admit_reservation'	=> 1,
        'linear_discount'	=> 20,
        'description'		=> $faker->paragraph(),
        'menu'				=> $faker->paragraph(),
    ];
});
