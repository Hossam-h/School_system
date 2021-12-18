<?php

use Illuminate\Database\Seeder;
use App\Models\Relegion;
use Illuminate\Support\Facades\DB;
class RelegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('relegions')->delete();

        $religions = [

            [
                'en'=> 'Muslim',
                'ar'=> 'مسلم'
            ],
            [
                'en'=> 'Christian',
                'ar'=> 'مسيحي'
            ],
            [
                'en'=> 'Other',
                'ar'=> 'غيرذلك'
            ],

        ];

        foreach($religions as $religion){
                   Relegion::create(['relegion'=>$religion]);
        }



    }
}
