<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolSetting extends Seeder


{
    /**
     * Run the database seeds.
     *
     * @return void
     */

public function run(){
    DB::table('setting_schools')->delete();
    $data=[

        ['key'=>'current_section', 'value'=>'2021-2022'],
        ['key'=>'school_tittel', 'value'=>'MS'],
        ['key'=>'school_name', 'value'=>'mora soft'],
        ['key'=>'end_first_term', 'value'=>'01-12-2022'],
        ['key'=>'end_second_term', 'value'=>'01-3-2022'],
        ['key'=>'address', 'value'=>'القاهرة'],
        ['key'=>'school_email', 'value'=>'info@morasoft@gmail.com'],
        ['key'=>'logo', 'value'=>'1.jpg']

    ];
    DB::table('setting_schools')->insert($data);

}



}
