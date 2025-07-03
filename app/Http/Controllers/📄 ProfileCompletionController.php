<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;

class ProfileCompletionController extends Controller
{
    public function showForm()
    {
        $member = Auth::user();
        $completion = $this->calculateCompletion($member);

        if ($completion >= 50) {
            return redirect()->route('dashboard');
        }

        return view('profile.complete-profile', [
            'member' => $member,
            'completion' => $completion,
        ]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'about_yourself' => 'nullable|string|max:2000',
            'about_partner' => 'nullable|string|max:2000',
        ]);

        $member = Auth::user();

        $member->update($request->only([
            'about_yourself',
            'about_partner',
        ]));

        return redirect()->route('profile.complete')->with('success', 'تم تحديث المعلومات بنجاح.');
    }

    private function calculateCompletion($member)
    {
        $fields = [
            'marital_status', 'marriage_type', 'city', 'has_children',
            'children_count', 'height', 'weight', 'skin_color', 'hair_color',
            'prays', 'religiosity', 'wears_hijab', 'has_beard', 'reads_quran',
            'education_level', 'job_status', 'monthly_income', 'willing_to_relocate',
            'native_language', 'other_languages', 'about_yourself', 'about_partner'
        ];

        $filled = 0;

        foreach ($fields as $field) {
            if (!is_null($member->$field)) {
                $filled++;
            }
        }

        return round(($filled / count($fields)) * 100);
    }
}
