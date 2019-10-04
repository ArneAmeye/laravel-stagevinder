<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;

$factory->define(\App\Companies::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'email' => $faker->email,
        //'email_verified'
        'password' => Hash::make($faker->password),
        'field_sector' => $faker->jobTitle,
        'manager_firstname' => $faker->firstName(),
        'manager_lastname' => $faker->lastName,
        'telephone' => $faker->phoneNumber,
        'city' => $faker->city,
        'zip_code' => $faker->postcode,
        'street_and_number' => $faker->streetAddress,
        'website' => $faker->url,
        //'remember_token'
        //'remember_at'
        //'updated_at'
    ];
});
