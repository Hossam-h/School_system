<?php

use App\Models\Spechialize;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SpechializeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('spechializes')->delete();
        $specializations = [
            ['en'=> 'Arabic', 'ar'=> 'عربي'],
            ['en'=> 'Sciences', 'ar'=> 'علوم'],
            ['en'=> 'Computer', 'ar'=> 'حاسب الي'],
            ['en'=> 'English', 'ar'=> 'انجليزي'],
        ];
        foreach ($specializations as $Spechialize) {
            Spechialize::create(['Name' => $Spechialize]);
        }
    }
}
