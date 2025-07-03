
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('cities')->insert([
            ['country_id' => 1, 'name_ar' => 'الجزائر العاصمة'],
            ['country_id' => 1, 'name_ar' => 'وهران'],
            ['country_id' => 2, 'name_ar' => 'الرياض'],
            ['country_id' => 2, 'name_ar' => 'جدة'],
            ['country_id' => 3, 'name_ar' => 'القاهرة'],
            ['country_id' => 3, 'name_ar' => 'الإسكندرية'],
            ['country_id' => 4, 'name_ar' => 'الرباط'],
            ['country_id' => 4, 'name_ar' => 'الدار البيضاء'],
        ]);
    }
}
