// ✅ المسار: app/Http/Controllers/ProfileCompletionController.php

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
            'completion' => $completion
        ]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'about_yourself' => 'nullable|string|max:2000',
            'about_partner' => 'nullable|string|max:2000',
            // أضف التحقق لباقي الحقول حسب الحاجة
        ]);

        $member = Auth::user();
        $member->update($request->only([
            'about_yourself',
            'about_partner',
            // أضف أي حقل آخر هنا
        ]));

        return redirect()->route('profile.complete')->with('success', 'تم تحديث ملفك بنجاح.');
    }

    private function calculateCompletion($member)
    {
        $fields = [
            'marital_status', 'marriage_type', 'city', 'has_children',
            'children_count', 'height', 'weight', 'skin_color',
            'hair_color', 'prays', 'religious', 'wears_hijab',
            'has_beard', 'reads_quran', 'education_level',
            'job_status', 'monthly_income', 'willing_to_relocate',
            'native_language', 'other_languages',
            'about_yourself', 'about_partner'
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


// ✅ المسار: routes/web.php

use App\Http\Controllers\ProfileCompletionController;

Route::middleware(['auth'])->group(function () {
    Route::get('/complete-profile', [ProfileCompletionController::class, 'showForm'])->name('profile.complete');
    Route::post('/complete-profile', [ProfileCompletionController::class, 'save']);
});


// ✅ المسار: resources/views/profile/complete-profile.blade.php

@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-8" dir="rtl">
    <h2 class="text-2xl font-bold mb-4">اكمل ملفك الشخصي</h2>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 p-4 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <label class="block font-semibold mb-1">نسبة الاكتمال:</label>
        <div class="w-full bg-gray-200 rounded-full h-4">
            <div class="bg-blue-500 h-4 rounded-full" style="width: {{ $completion }}%"></div>
        </div>
        <span class="text-sm text-gray-600">{{ $completion }}%</span>
    </div>

    <form method="POST" action="{{ route('profile.complete') }}" class="space-y-6">
        @csrf

        <div>
            <label class="block font-semibold mb-1">عرف بنفسك:</label>
            <textarea name="about_yourself" class="w-full p-2 border rounded" rows="4">{{ old('about_yourself', $member->about_yourself) }}</textarea>
        </div>

        <div>
            <label class="block font-semibold mb-1">تكلم حول شريكك:</label>
            <textarea name="about_partner" class="w-full p-2 border rounded" rows="4">{{ old('about_partner', $member->about_partner) }}</textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">حفظ المعلومات</button>
    </form>
</div>
@endsection


// ✅ تعديل بسيط على DashboardController أو أي مكان يتجه المستخدم إليه بعد تسجيل الدخول:

if ($this->calculateCompletion($user) < 50) {
    return redirect()->route('profile.complete');
}
