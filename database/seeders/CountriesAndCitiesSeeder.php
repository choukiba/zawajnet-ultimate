<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\City;
use Illuminate\Support\Facades\File;

class CountriesAndCitiesSeeder extends Seeder
{
    public function run(): void
    {
        $file = storage_path('app/worldcities.csv');
        if (! File::exists($file)) {
            $this->command->error('ملف worldcities.csv مفقود في storage/app');
            return;
        }

        $handle = fopen($file, 'r');
        $header = fgetcsv($handle);

        $countriesMap = [];

        while ($row = fgetcsv($handle)) {
            $data = array_combine($header, $row);
            $countryName = $data['country'];

            // إضافة الدولة لمرة واحدة
            if (! isset($countriesMap[$countryName])) {
                $c = Country::create([
                    'name_en' => $countryName,
                    'iso2' => $data['iso2'] ?: null,
                    'iso3' => $data['iso3'] ?: null,
                ]);
                $countriesMap[$countryName] = $c->id;
            }

            City::create([
                'name_en' => $data['city'],
                'country_id' => $countriesMap[$countryName],
                'admin_name' => $data['admin_name'] ?: null,
                'lat' => $data['lat'] ?: null,
                'lng' => $data['lng'] ?: null,
            ]);
        }

        fclose($handle);
        $this->command->info('✅ import completed: '.count($countriesMap).' countries and cities.');
    }
}
