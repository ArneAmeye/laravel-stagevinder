<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;

$factory->define(\App\Company::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'email' => $faker->email,
        //'email_verified'
        'password' => Hash::make($faker->password),
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
        'profile_picture' => $faker->imageUrl($width = 640, $height = 480),
        'background_picture' => $faker->imageUrl($width = 1920, $height = 1080),
        'linkedIn'=>$faker->url,
        'bio'=>$faker->text
        //'remember_token'
        //'remember_at'
        //'updated_at'
    ];
});
