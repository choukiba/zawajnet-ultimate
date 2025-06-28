@extends('layouts.app')

@section('content')
<div class="bg-white py-10" dir="rtl">
    <div class="max-w-3xl mx-auto px-6">
        {{-- ✅ عنوان الصفحة --}}
        <h2 class="text-3xl font-bold text-center text-blue-800 mb-6">تعديل الملف الشخصي</h2>

        {{-- ✅ نموذج التعديل --}}
        <form method="POST" action="{{ route('profile.update', $member->id) }}" class="bg-gray-50 p-6 rounded-xl shadow-md space-y-5">
            @csrf
            @method('PUT')

            {{-- الاسم --}}
            <div>
                <label class="block mb-1 font-medium">الاسم الكامل</label>
                <input type="text" name="name" value="{{ old('name', $member->name) }}" class="w-full border rounded p-2" required>
            </div>

            {{-- العمر --}}
            <div>
                <label class="block mb-1 font-medium">العمر</label>
                <input type="number" name="age" value="{{ old('age', $member->age) }}" class="w-full border rounded p-2" required>
            </div>

            {{-- الدولة --}}
            <div>
                <label class="block mb-1 font-medium">الدولة</label>
                <input type="text" name="country" value="{{ old('country', $member->country) }}" class="w-full border rounded p-2" required>
            </div>

            {{-- نوع الزواج --}}
            <div>
                <label class="block mb-1 font-medium">نوع الزواج</label>
                <input type="text" name="marriage_type" value="{{ old('marriage_type', $member->marriage_type) }}" class="w-full border rounded p-2">
            </div>

            {{-- زر الحفظ --}}
            <div class="text-center pt-4">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition">
                    💾 حفظ التعديلات
                </button>
            </div>
        </form>

        {{-- زر الرجوع --}}
        <div class="text-center mt-6">
            <a href="{{ route('profile.show', $member->id) }}" class="text-blue-600 hover:underline">🔙 الرجوع إلى الملف الشخصي</a>
        </div>
    </div>
</div>
@endsection
