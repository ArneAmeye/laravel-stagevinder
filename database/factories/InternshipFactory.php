<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;

$factory->define(\App\Internships::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'company_id' => 1,
        'description' => $faker->realText(200),
        'is_available' => 1,
        //'remember_token'
        //'created_at'
        //'updated_at'
    ];
});
