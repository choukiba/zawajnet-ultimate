<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesSeeder extends Seeder
{
    public function run()
    {
        DB::table('cities')->truncate();

        $cities = [
            ['name_ar' => 'الجزائر', 'country_id' => 1],
            ['name_ar' => 'وهران', 'country_id' => 1],
            ['name_ar' => 'قسنطينة', 'country_id' => 1],
            ['name_ar' => 'باريس', 'country_id' => 2],
            ['name_ar' => 'مرسيليا', 'country_id' => 2],
            ['name_ar' => 'إسطنبول', 'country_id' => 3],
            ['name_ar' => 'أنقرة', 'country_id' => 3],
        ];

        DB::table('cities')->insert($cities);
    }
}
