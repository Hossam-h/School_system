<?php

use Illuminate\Database\Seeder;
use App\Models\Nationalte;
use Illuminate\Support\Facades\DB;

class NationalteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nationaltes')->delete();

        $nationals = [

            [
                'en'=> 'Afghan',
                'ar'=> 'أفغانستاني'
            ],
            [

                'en'=> 'Albanian',
                'ar'=> 'ألباني'
            ],
            [

                'en'=> 'Aland Islander',
                'ar'=> 'آلاندي'
            ],
            [

                'en'=> 'Algerian',
                'ar'=> 'جزائري'
            ],
            [

                'en'=> 'American Samoan',
                'ar'=> 'أمريكي سامواني'
            ],
            [

                'en'=> 'Andorran',
                'ar'=> 'أندوري'
            ],
            [

                'en'=> 'Angolan',
                'ar'=> 'أنقولي'
            ],
            [

                'en'=> 'Anguillan',
                'ar'=> 'أنغويلي'
            ],
            [

                'en'=> 'Antarctican',
                'ar'=> 'أنتاركتيكي'
            ],
            [

                'en'=> 'Antiguan',
                'ar'=> 'بربودي'
            ],
            [

                'en'=> 'Argentinian',
                'ar'=> 'أرجنتيني'
            ],
            [

                'en'=> 'Armenian',
                'ar'=> 'أرميني'
            ],
            [

                'en'=> 'Aruban',
                'ar'=> 'أوروبهيني'
            ],
            [

                'en'=> 'Australian',
                'ar'=> 'أسترالي'
            ],
            [

                'en'=> 'Austrian',
                'ar'=> 'نمساوي'
            ],
            [

                'en'=> 'Azerbaijani',
                'ar'=> 'أذربيجاني'
            ],
            [

                'en'=> 'Bahamian',
                'ar'=> 'باهاميسي'
            ],
            [

                'en'=> 'Bahraini',
                'ar'=> 'بحريني'
            ],
            [

                'en'=> 'Bangladeshi',
                'ar'=> 'بنغلاديشي'
            ],
            [

                'en'=> 'Barbadian',
                'ar'=> 'بربادوسي'
            ],
            [

                'en'=> 'Belarusian',
                'ar'=> 'روسي'
            ],
            [

                'en'=> 'Belgian',
                'ar'=> 'بلجيكي'
            ],
            [

                'en'=> 'Belizean',
                'ar'=> 'بيليزي'
            ],
            [

                'en'=> 'Beninese',
                'ar'=> 'بنيني'
            ],
            [

                'en'=> 'Saint Barthelmian',
                'ar'=> 'سان بارتيلمي'
            ],
            [

                'en'=> 'Bermudan',
                'ar'=> 'برمودي'
            ],
            [

                'en'=> 'Bhutanese',
                'ar'=> 'بوتاني'
            ],
            [

                'en'=> 'Bolivian',
                'ar'=> 'بوليفي'
            ],
            [

                'en'=> 'Bosnian / Herzegovinian',
                'ar'=> 'بوسني/هرسكي'
            ],
            [

                'en'=> 'Botswanan',
                'ar'=> 'بوتسواني'
            ],
            [

                'en'=> 'Bouvetian',
                'ar'=> 'بوفيهي'
            ],
            [

                'en'=> 'Egypt',
                'ar'=> 'مصر'
            ],
            [

                'en'=> 'Brazilian',
                'ar'=> 'برازيلي'
            ],
            [

                'en'=> 'British Indian Ocean Territory',
                'ar'=> 'إقليم المحيط الهندي البريطاني'
            ],
            [

                'en'=> 'Bruneian',
                'ar'=> 'بروني'
            ],
            [

                'en'=> 'Bulgarian',
                'ar'=> 'بلغاري'
            ],
            [

                'en'=> 'Burkinabe',
                'ar'=> 'بوركيني'
            ],
            [

                'en'=> 'Burundian',
                'ar'=> 'بورونيدي'
            ],
            [

                'en'=> 'Cambodian',
                'ar'=> 'كمبودي'
            ],
            [

                'en'=> 'Cameroonian',
                'ar'=> 'كاميروني'
            ],

            [

                'en'=> 'Iraqi',
                'ar'=> 'عراقي'
            ],
            [

                'en'=> 'Irish',
                'ar'=> 'إيرلندي'
            ],

            [

                'en'=> 'Zimbabwean',
                'ar'=> 'زمبابوي'
            ]
        ];


        foreach ($nationals as $n){
             Nationalte::create(['name'=>$n]);
        }

    }
}
