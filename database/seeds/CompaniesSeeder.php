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
        $company1->user_id = '5';
        $company1->name = 'Skylux';
        $company1->email = 'skylux@stagevinder.be';
        $company1->password = Hash::make('password');
        $company1->field_sector = 'IT in daylight production';
        $company1->manager_firstname = 'Joeri';
        $company1->manager_lastname = 'Bruneel';
        $company1->city = 'Stasegem';

        $company1->save();
        
        //Autocreate with Faker
        factory(\App\Company::class, 50)->create();
    }
}
