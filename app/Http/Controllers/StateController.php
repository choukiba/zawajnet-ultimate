<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;

class StateController extends Controller
{
    /**
     * إرجاع قائمة المحافظات حسب الدولة
     *
     * @param  int  $country_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStates($country_id)
    {
        // جلب المحافظات المرتبطة بـ country_id
        $states = State::where('country_id', $country_id)->get();

        // إرجاعها بصيغة JSON
        return response()->json($states);
    }
}
