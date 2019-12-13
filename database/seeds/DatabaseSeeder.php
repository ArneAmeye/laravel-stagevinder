<<<<<<< HEAD
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
=======
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
    }
}
>>>>>>> d2f100ff657389dda78a98a6abe72143695c3039
