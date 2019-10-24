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
        $company1->profile_picture = "default.png";
        $company1->background_picture = "default.jpg";
        $company1->save();
        
        //Autocreate with Faker
        factory(\App\Company::class, 50)->create();
    }
}
