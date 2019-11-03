<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;

$factory->define(\App\Company::class, function (Faker $faker) {
    static $company_id = 55;

    return [
        'name' => $faker->company,
        //'email_verified'
        'field_sector' => $faker->jobTitle,
        'CEO_firstname' => $faker->firstName(),
        'CEO_lastname' => $faker->lastName,
        'manager_firstname' => $faker->firstName(),
        'manager_lastname' => $faker->lastName,
        'mobile_number' => $faker->phoneNumber,
        'city' => $faker->city,
        'zip_code' => $faker->postcode,
        'street_and_number' => $faker->streetAddress,
        'website' => $faker->url,
        'profile_picture' => "default.png",
        'background_picture' => "default.jpg",
        'linkedIn' => $faker->url,
        'bio' => $faker->text(150),
        'user_id' => $company_id++,
        //'remember_token'
        //'remember_at'
        //'updated_at'
    ];
});
