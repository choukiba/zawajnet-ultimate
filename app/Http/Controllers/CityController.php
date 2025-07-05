<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    /**
     * جلب المدن حسب الدولة المحددة
     */
    public function getCities($country_id)
    {
        // نعيد فقط id و name_ar للعرض في الواجهة
        $cities = City::where('country_id', $country_id)
                      ->select('id', 'name_ar')
                      ->orderBy('name_ar')
                      ->get();

        return response()->json($cities);
    }
}
