use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesSeeder extends Seeder
{
    public function run()
    {
        $cities = [
            ['country_id' => 1, 'name_ar' => 'الجزائر العاصمة'],
            ['country_id' => 1, 'name_ar' => 'وهران'],
            ['country_id' => 1, 'name_ar' => 'قسنطينة'],
            ['country_id' => 2, 'name_ar' => 'القاهرة'],
            ['country_id' => 2, 'name_ar' => 'الاسكندرية'],
        ];

        foreach ($cities as $city) {
            DB::table('cities')->insert($city);
        }
    }
}
