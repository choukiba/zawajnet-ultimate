<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\City;

class LocationController extends Controller
{
    public function getCities($country_id)
    {
       $cities = City::where('country_id', $country_id)->orderBy('name_ar')->get();
        return response()->json($cities);
        return response()->json($cities);
    }
}




  