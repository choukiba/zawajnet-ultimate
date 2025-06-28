<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        // البحث في جدول الأعضاء باستخدام الشروط المدخلة
        $results = Member::query()
            ->when($request->gender, fn($q) => $q->where('gender', $request->gender))
            ->when($request->age, fn($q) => $q->where('age', $request->age))
            ->when($request->country, fn($q) => $q->where('country', $request->country))
            ->get();

        return view('search.results', compact('results'));
    }
}
