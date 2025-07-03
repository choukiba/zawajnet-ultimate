
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('countries')->insert([
            ['name_ar' => 'الجزائر', 'name_en' => 'Algeria'],
            ['name_ar' => 'السعودية', 'name_en' => 'Saudi Arabia'],
            ['name_ar' => 'مصر', 'name_en' => 'Egypt'],
            ['name_ar' => 'المغرب', 'name_en' => 'Morocco'],
            ['name_ar' => 'تونس', 'name_en' => 'Tunisia'],
            ['name_ar' => 'فلسطين', 'name_en' => 'Palestine'],
            ['name_ar' => 'الأردن', 'name_en' => 'Jordan'],
            ['name_ar' => 'لبنان', 'name_en' => 'Lebanon'],
            ['name_ar' => 'العراق', 'name_en' => 'Iraq'],
            ['name_ar' => 'اليمن', 'name_en' => 'Yemen'],
        ]);
    }
}
