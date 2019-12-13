<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(CompaniesSeeder::class);
        $this->call(StudentsSeeder::class);
        $this->call(ReviewInternshipsSeeder::class);
        $this->call(InternshipsSeeder::class);
        $this->call(TagsSeeder::class);
    }
}
