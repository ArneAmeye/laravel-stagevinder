<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;

$factory->define(\App\Student::class, function (Faker $faker) {
    //$students = App\User::all()->pluck('id')->toArray();
    static $student_id = 5;

    return [
        'firstname' => $faker->firstName(),
        'lastname' => $faker->lastName,
        'birth_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'profile_picture' => "default.png",
        'background_picture' => "default.jpg",
        //'email_verified'
        'field_study' => $faker->jobTitle,
        'school' => $faker->company,
        'adress' => $faker->address,
        'mobile_number' => $faker->phoneNumber,
        'linkedIn' => $faker->url,
        'skype' => $faker->url,
        'website' => $faker->url,
        'bio' => $faker->realText(191),
        'user_id' => $student_id++,
        //'remember_token'
        //'remember_at'
        //'updated_at'
    ];
});
