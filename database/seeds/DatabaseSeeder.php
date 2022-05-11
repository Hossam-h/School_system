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
        $this->call(SpechializeSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(SchoolSetting::class);
        $this->call(UserSeeder::class);
    }
}
