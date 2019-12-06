<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
    	$user1 = new \App\User();
        $user1->email = 'arne@stagevinder.be';
        $user1->password = Hash::make('password');
        $user1->save();

        $user2 = new \App\User();
        $user2->email = 'irene@stagevinder.be';
        $user2->password = Hash::make('password');
        $user2->save();
        
        $user3 = new \App\User();
        $user3->email = 'lars@stagevinder.be';
        $user3->password = Hash::make('password');
        $user3->save();

        $user4 = new \App\User();
        $user4->email = 'bram@stagevinder.be';
        $user4->password = Hash::make('password');
        $user4->save();

        $user5 = new \App\User();
        $user5->email = 'thomasmore@stagevinder.be';
        $user5->password = Hash::make('password');
        $user5->save();

        $user6 = new \App\User();
        $user6->email = 'intracto@stagevinder.be';
        $user6->password = Hash::make('password');
        $user6->save();

        $user7 = new \App\User();
        $user7->email = 'capgemini@stagevinder.be';
        $user7->password = Hash::make('password');
        $user7->save();

        $user8 = new \App\User();
        $user8->email = 'studiohyperdrive@stagevinder.be';
        $user8->password = Hash::make('password');
        $user8->save();

        $user9 = new \App\User();
        $user9->email = 'studiohyperdrivehoofdkantoor@stagevinder.be';
        $user9->password = Hash::make('password');
        $user9->save();

        $user10 = new \App\User();
        $user10->email = 'minsky@stagevinder.be';
        $user10->password = Hash::make('password');
        $user10->save();

        $user11 = new \App\User();
        $user11->email = 'janedoe@stagevinder.be';
        $user11->password = Hash::make('password');
        $user11->save();

        $user12 = new \App\User();
        $user12->email = 'kingtrainnee@stagevinder.be';
        $user12->password = Hash::make('password');
        $user12->save();

        //factory(\App\User::class, 100)->create();
    }
}