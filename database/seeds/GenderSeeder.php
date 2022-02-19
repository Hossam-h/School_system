<?php

use Illuminate\Database\Seeder;
use App\Models\Gender;
use Illuminate\Support\Facades\DB;


class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders')->delete();
        $grades = [
            ['en'=> 'maile', 'ar'=> 'ذكر'],
            ['en'=> 'female', 'ar'=> 'أنثي'],

        ];


        foreach ($grades as $grade) {
            Gender::create(['Name'=>$grade]);
        }


    }
}
