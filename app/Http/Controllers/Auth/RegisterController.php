<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function create(): View
    {
        $countries = Country::orderBy('name_ar', 'asc')->get();
        return view('auth.register', compact('countries'));
    }
}