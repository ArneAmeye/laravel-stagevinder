<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;

$factory->define(\App\Student::class, function (Faker $faker) {
    return [
        'firstname' => $faker->firstName(),
        'lastname' => $faker->lastName,
        'birth_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'profile_picture' => $faker->imageUrl($width = 200, $height = 200),
        'background_picture' => $faker->imageUrl($width = 640, $height = 480),
        'email' => $faker->email,
        //'email_verified'
        'password' => Hash::make($faker->password),
        'field_study' => $faker->jobTitle,
        'school' => $faker->company,
        'adress' => $faker->address,
        'mobile_number' => $faker->phoneNumber,
        'linkedIn' => $faker->url,
        'skype' => $faker->url,
        'website' => $faker->url,
        'bio' => $faker->realText(200),
        //'remember_token'
        //'remember_at'
        //'updated_at'
    ];
});
