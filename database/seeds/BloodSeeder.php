<?php

use Illuminate\Database\Seeder;
use App\Models\Blood;
use Illuminate\Support\Facades\DB;
class BloodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('bloods')->delete();
        $blood_types = ['O-', 'O+', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-'];

        foreach($blood_types as $blood){
         Blood::create(['type'=>$blood]);
        }


    }
}
