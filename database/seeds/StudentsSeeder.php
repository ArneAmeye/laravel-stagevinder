<?php

use Illuminate\Database\Seeder;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $student = new \App\Student();
        $student->fistname = 'John';
        $student->lastname = 'Doe';
        $student->email = 'johndoe@stagevinder.be';
        $student->password = Hash::make('password');
        $student->field_study = 'Webdevelopment';
        $student->school = 'Thomas More Highschool';
        $student->bio = 'Lorem Ipsum';
        factory(\App\Students::class, 50)->create();
    }
}
