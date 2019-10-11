<?php

use Illuminate\Database\Seeder;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $student1 = new \App\Student();
        $student1->firstname = 'Arne';
        $student1->lastname = 'Ameye';
        $student1->email = 'arne@stagevinder.be';
        $student1->password = Hash::make('password');
        $student1->field_study = 'Webdevelopment';
        $student1->school = 'Thomas More Highschool';
        $student1->bio = 'Lorem Ipsum';
        $student1->save();

        $student2 = new \App\Student();
        $student2->firstname = 'Irene';
        $student2->lastname = 'Haegeman';
        $student2->email = 'irene@stagevinder.be';
        $student2->password = Hash::make('password');
        $student2->field_study = 'Interactieve Multimedia Design';
        $student2->school = 'Thomas More Highschool';
        $student2->bio = 'Lorem Ipsum';
        $student2->save();
        
        $student4 = new \App\Student();
        $student4->firstname = 'Lars';
        $student4->lastname = 'Pauwels';
        $student4->email = 'lars@stagevinder.be';
        $student4->password = Hash::make('password');
        $student4->field_study = 'Webdevelopment';
        $student4->school = 'Thomas More Highschool';
        $student4->bio = 'Lorem Ipsum';
        $student4->save();

        $student5 = new \App\Student();
        $student5->firstname = 'Bram';
        $student5->lastname = 'Ravijts';
        $student5->email = 'bram@stagevinder.be';
        $student5->password = Hash::make('password');
        $student5->field_study = 'Webdevelopment';
        $student5->school = 'Thomas More Highschool';
        $student5->bio = 'Lorem Ipsum';
        $student5->save();

        factory(\App\Student::class, 50)->create();
    }
}
