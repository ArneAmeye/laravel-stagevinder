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
        $student1->fistname = 'Arne';
        $student1->lastname = 'Ameye';
        $student1->email = 'arne@stagevinder.be';
        $student1->password = Hash::make('password');
        $student1->field_study = 'Webdevelopment';
        $student1->school = 'Thomas More Highschool';
        $student1->bio = 'Lorem Ipsum';

        $student2 = new \App\Student();
        $student2->fistname = 'Irene';
        $student2->lastname = 'Haegeman';
        $student2->email = 'irene@stagevinder.be';
        $student2->password = Hash::make('password');
        $student2->field_study = 'Interactieve Multimedia Design';
        $student2->school = 'Thomas More Highschool';
        $student2->bio = 'Lorem Ipsum';

        $student3 = new \App\Student();
        $student3->fistname = 'Arne';
        $student3->lastname = 'Ameye';
        $student3->email = 'arne@stagevinder.be';
        $student3->password = Hash::make('password');
        $student3->field_study = 'Webdevelopment';
        $student3->school = 'Thomas More Highschool';
        $student3->bio = 'Lorem Ipsum';

        $student4 = new \App\Student();
        $student4->fistname = 'Lars';
        $student4->lastname = 'Pauwels';
        $student4->email = 'Lars@stagevinder.be';
        $student4->password = Hash::make('password');
        $student4->field_study = 'Webdevelopment';
        $student4->school = 'Thomas More Highschool';
        $student4->bio = 'Lorem Ipsum';

        $student5 = new \App\Student();
        $student5->fistname = 'Bram';
        $student5->lastname = 'Ravijts';
        $student5->email = 'bram@stagevinder.be';
        $student5->password = Hash::make('password');
        $student5->field_study = 'Webdevelopment';
        $student5->school = 'Thomas More Highschool';
        $student5->bio = 'Lorem Ipsum';

        factory(\App\Student::class, 50)->create();
    }
}
