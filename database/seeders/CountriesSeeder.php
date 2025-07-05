<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('countries')->insert([
            ['id' => 1, 'name_ar' => 'الجزائر',     'name_en' => 'Algeria'],
            ['id' => 2, 'name_ar' => 'المغرب',      'name_en' => 'Morocco'],
            ['id' => 3, 'name_ar' => 'تونس',        'name_en' => 'Tunisia'],
            ['id' => 4, 'name_ar' => 'مصر',         'name_en' => 'Egypt'],
            ['id' => 5, 'name_ar' => 'السعودية',    'name_en' => 'Saudi Arabia'],
            ['id' => 6, 'name_ar' => 'فرنسا',       'name_en' => 'France'],
            ['id' => 7, 'name_ar' => 'ألمانيا',     'name_en' => 'Germany'],
            ['id' => 8, 'name_ar' => 'إسبانيا',     'name_en' => 'Spain'],
            ['id' => 9, 'name_ar' => 'إيطاليا',     'name_en' => 'Italy'],
            ['id' => 10, 'name_ar' => 'فلسطين',      'name_en' => 'PALASTINE'],
            ['id' => 11, 'name_ar' => 'تركيا',      'name_en' => 'Turkey'],
            
        ]);
    }
}
