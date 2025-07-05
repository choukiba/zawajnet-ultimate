<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        $file = database_path('seeders/data/countries_final.csv');
        $countries = array_map('str_getcsv', file($file));
        $header = array_shift($countries);

        foreach ($countries as $row) {
            $data = array_combine($header, $row);
            DB::table('countries')->insert([
                'id' => $data['id'],
                'name_en' => $data['name_en'],
                'name_ar' => $data['name_ar'],
                'code' => $data['code'],
            ]);
        }
    }
}
