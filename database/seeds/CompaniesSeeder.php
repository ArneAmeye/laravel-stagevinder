<?php

use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //Creating 1 manual company for development purposes
        $company1 = new \App\Company();
        $company1->user_id = 5;
        $company1->name = 'Thomas More';
        $company1->zip_code = '3000';
        $company1->street_and_number = 'Lange Ridderstraat 44';
        $company1->city = 'Mechelen';
        $company1->profile_picture = 'default.png';
        $company1->background_picture = 'default.jpg';
        $company1->save();

        $company2 = new \App\Company();
        $company2->user_id = 6;
        $company2->name = 'Intracto';
        $company2->city = 'Herentals';
        $company2->profile_picture = 'default.png';
        $company2->background_picture = 'default.jpg';
        $company2->save();

        $company3 = new \App\Company();
        $company3->user_id = 7;
        $company3->name = 'Capgemini Belgium';
        $company3->city = 'Diegem';
        $company3->profile_picture = 'capgemini.png';
        $company3->background_picture = 'default.jpg';
        $company3->save();

        $company4 = new \App\Company();
        $company4->user_id = 8;
        $company4->name = 'Studio Hyperdrive';
        $company4->city = 'Kontich';
        $company4->profile_picture = 'studio_hyperdrive.png';
        $company4->background_picture = 'studio_hyperdrive.jpg';
        $company4->save();

        $company5 = new \App\Company();
        $company5->user_id = 9;
        $company5->name = 'Studio Hyperdrive';
        $company5->city = 'Gent';
        $company5->profile_picture = 'studio_hyperdrive.png';
        $company5->background_picture = 'studio_hyperdrive.jpg';
        $company5->save();

        $company6 = new \App\Company();
        $company6->user_id = 10;
        $company6->name = 'Minsky';
        $company6->city = 'Leuven';
        $company6->profile_picture = 'minsky.PNG';
        $company6->background_picture = 'minsky.jpg';
        $company6->save();

        $company7 = new \App\Company();
        $company7->user_id = 12;
        $company7->name = 'Kingtrainnee';
        $company7->city = 'Mechelen';
        $company7->profile_picture = 'default.png';
        $company7->background_picture = 'default.jpg';
        $company7->save();

        //Autocreate with Faker
        //factory(\App\Company::class, 50)->create();
    }
}
