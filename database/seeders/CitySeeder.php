<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        $file = database_path('seeders/data/cities_final.csv');
        $cities = array_map('str_getcsv', file($file));
        $header = array_shift($cities);

        foreach ($cities as $row) {
            $data = array_combine($header, $row);
            DB::table('cities')->insert([
                'country_id' => $data['country_id'],
                'name_en' => $data['name_en'],
                'name_ar' => $data['name_ar'],
            ]);
        }
    }
}
