<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
    	$student1 = new \App\User();
        $student1->email = 'arne@stagevinder.be';
        $student1->password = Hash::make('password');
        $student1->save();

        $student2 = new \App\User();
        $student2->email = 'irene@stagevinder.be';
        $student2->password = Hash::make('password');
        $student2->save();
        
        $student4 = new \App\User();
        $student4->email = 'lars@stagevinder.be';
        $student4->password = Hash::make('password');
        $student4->save();

        $student5 = new \App\User();
        $student5->email = 'bram@stagevinder.be';
        $student5->password = Hash::make('password');
        $student5->save();

        factory(\App\User::class, 100)->create();
    }
}