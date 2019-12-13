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
        $student1->field_study = 'Webdevelopment';
        $student1->school = 'Thomas More Highschool';
        $student1->bio = '#kingtrainee 👑';
        $student1->profile_picture = "default.png";
        $student1->background_picture = "default.jpg";
        $student1->user_id = 1;
        $student1->save();

        $student2 = new \App\Student();
        $student2->firstname = 'Irene';
        $student2->lastname = 'Haegeman';
        $student2->field_study = 'Interactieve Multimedia Design';
        $student2->school = 'Thomas More Highschool';
        $student2->bio = '#kingtrainee 👑';
        $student2->profile_picture = "default.png";
        $student2->background_picture = "default.jpg";
        $student2->user_id = 2;
        $student2->save();

        $student3 = new \App\Student();
        $student3->firstname = 'Lars';
        $student3->lastname = 'Pauwels';
        $student3->field_study = 'Webdevelopment';
        $student3->school = 'Thomas More Highschool';
        $student3->bio = '#kingtrainee 👑';
        $student3->profile_picture = "default.png";
        $student3->background_picture = "default.jpg";
        $student3->user_id = 3;
        $student3->save();

        $student4 = new \App\Student();
        $student4->firstname = 'Bram';
        $student4->lastname = 'Ravijts';
        $student4->field_study = 'Webdevelopment';
        $student4->school = 'Thomas More Highschool';
        $student4->bio = '#kingtrainee 👑';
        $student4->profile_picture = "default.png";
        $student4->background_picture = "default.jpg";
        $student4->user_id = 4;
        $student4->save();

        $student5 = new \App\Student();
        $student5->firstname = 'Jane';
        $student5->lastname = 'Doe';
        $student5->field_study = 'Webdesign';
        $student5->school = 'Thomas More Highschool';
        $student5->bio = 'Drawing, Tai Kwando and Cake 💗';
        $student5->profile_picture = "default.png";
        $student5->background_picture = "default.jpg";
        $student5->user_id = 11;
        $student5->save();

        //factory(\App\Student::class, 50)->create();
    }
}
