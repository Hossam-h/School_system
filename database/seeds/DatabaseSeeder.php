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
        // $this->call(UserSeeder::class);
        $this->call(BloodSeeder::class);
        $this->call(NationalteSeeder::class);
        $this->call(RelegionSeeder::class);
    }
}
