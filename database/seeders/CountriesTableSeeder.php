namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesSeeder extends Seeder
{
    public function run()
    {
        $countries = [
            ['name_ar' => 'الجزائر'], ['name_ar' => 'مصر'], ['name_ar' => 'المغرب'], ['name_ar' => 'تونس'],
            ['name_ar' => 'ليبيا'], ['name_ar' => 'السودان'], ['name_ar' => 'السعودية'], ['name_ar' => 'الإمارات'],
            ['name_ar' => 'قطر'], ['name_ar' => 'البحرين'], ['name_ar' => 'الكويت'], ['name_ar' => 'عُمان'],
            ['name_ar' => 'العراق'], ['name_ar' => 'الأردن'], ['name_ar' => 'لبنان'], ['name_ar' => 'سوريا'],
            ['name_ar' => 'فلسطين'], ['name_ar' => 'اليمن'], ['name_ar' => 'موريتانيا'], ['name_ar' => 'جيبوتي']
        ];

        foreach ($countries as $country) {
            DB::table('countries')->insert($country);
        }
    }
}
