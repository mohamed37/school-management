<?php

use Illuminate\Database\Seeder;
use App\Models\Nationality;
use Illuminate\Support\Facades\DB;

class NationalityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nationalities')->delete();

        $nationals =  [

            [

                'en'=> 'Egyptian',
                'ar'=> 'مصري'
            ],

            [

                'en'=> 'Argentinian',
                'ar'=> 'أرجنتيني'
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

                'en'=> 'Bahraini',
                'ar'=> 'بحريني'
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

                'en'=> 'Brazilian',
                'ar'=> 'برازيلي'
            ],
            
            [

                'en'=> 'Burkinabe',
                'ar'=> 'بوركيني'
            ],
            
            [

                'en'=> 'Cameroonian',
                'ar'=> 'كاميروني'
            ],
            [

                'en'=> 'Canadian',
                'ar'=> 'كندي'
            ],
            
            [

                'en'=> 'Central African',
                'ar'=> 'أفريقي'
            ],
           
            [

                'en'=> 'Chinese',
                'ar'=> 'صيني'
            ],
           
           
           
            [

                'en'=> 'French',
                'ar'=> 'فرنسي'
            ],
          
            [

                'en'=> 'German',
                'ar'=> 'ألماني'
            ],
            
            [

                'en'=> 'Italian',
                'ar'=> 'إيطالي'
            ],
                       

        ];

        foreach ($nationals as $n) {
            Nationality::create(['name' => $n]);
        }

    }
}
