<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Religion;

class ReligionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('religions')->delete();

        $religions = [
            [
                'en' => 'Muslim',
                'ar' => 'مسلم'
            ],

            [
                'en' => 'Christain',
                'ar' => 'مسيحي'
            ],
            [
                'en' => 'Other',
                'ar' => 'اخري'
            ],
        ];

        foreach($religions as $r)
        {
            Religion::create(['name' => $r]);
        }
    }
}
