<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;

$factory->define(\App\Internship::class, function (Faker $faker) {
    return [
        'title' => $faker->jobTitle,
        'company_id' => 1,
        'description' => $faker->realText(191),
        'requirements' => $faker->realText(191),
        'field_sector' => $faker->jobTitle,
        'background_picture' => "default.jpg",
        'is_available' => 1,
        //'remember_token'
        //'created_at'
        //'updated_at'
    ];
});
