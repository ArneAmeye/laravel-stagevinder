<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;

$factory->define(\App\Internship::class, function (Faker $faker) {
    return [
        'name' => $faker->jobTitle,
        'company_id' => 1,
        'description' => $faker->realText(200),
        'sector' => $faker->jobTitle,
        'background_picture' => $faker->imageUrl($width = 1920, $height = 1080),
        'is_available' => 1,
        //'remember_token'
        //'created_at'
        //'updated_at'
    ];
});
