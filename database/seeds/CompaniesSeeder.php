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
        $company1->city = 'Mechelen';
        $company1->profile_picture = 'default.png';
        $company1->background_picture = 'default.jpg';
        $company1->save();

        $company2 = new \App\Company();
        $company2->id = '6';
        $company2->name = 'Intracto';
        $company2->city = 'Herentals';
        $company2->profile_picture = 'default.png';
        $company2->background_picture = 'default.jpg';
        $company2->save();

        //Autocreate with Faker
        factory(\App\Company::class, 50)->create();
    }
}
