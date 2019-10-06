<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;

$factory->define(\App\Student::class, function (Faker $faker) {
    return [
        'firstname' => $faker->firstName(),
        'lastname' => $faker->lastName,
        'email' => $faker->email,
        //'email_verified'
        'password' => Hash::make($faker->password),
        'field_study' => $faker->jobTitle,
        'school' => $faker->company,
        'bio' => $faker->realText(200),
        //'remember_token'
        //'remember_at'
        //'updated_at'
    ];
});
