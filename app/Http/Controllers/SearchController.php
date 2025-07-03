<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = Member::query();

        // فلترة حسب الجنس
        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        // فلترة حسب العمر
        if ($request->filled('age')) {
            $query->where('age', $request->age);
        }

        // فلترة حسب الدولة
        if ($request->filled('country')) {
            $query->where('country', $request->country);
        }

        // تنفيذ البحث
        $members = $query->get();

        return view('search.search-results', compact('members'));
    }
}

