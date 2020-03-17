<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Brand;

$factory->define(Brand::class, function (Faker $faker) {
    return [
        'name' 				=> $faker->company,
        'rif'				=> Str::random(15),
        'tel' 				=> $faker->phoneNumber,
        'contact_person'	=> $faker->name,
        'email'				=> $faker->unique()->safeEmail,
        'address'			=> $faker->address,
        'logo'				=> $faker->imageUrl(1081, 1081),
        'status'			=> 1,
    ];
});
