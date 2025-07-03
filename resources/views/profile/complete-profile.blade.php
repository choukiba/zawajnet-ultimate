@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 p-6 bg-white rounded-xl shadow text-right" dir="rtl">
    <h1 class="text-2xl font-bold mb-4 text-gray-800 text-center">أكمل ملفك الشخصي</h1>

    @if(session('success'))
        <div class="mb-4 p-4 rounded bg-green-100 text-green-800 text-sm text-center">
            {{ session('success') }}
        </div>
    @endif

    <p class="text-center text-sm text-gray-600 mb-6">
        نسبة اكتمال الملف: <span class="font-semibold text-blue-600">{{ $completion }}%</span>
    </p>

    <form action="{{ route('profile.complete') }}" method="POST" class="space-y-6">
        @csrf

        <!-- حقل عرف بنفسك -->
        <div>
            <label for="about_yourself" class="block text-gray-700 font-medium mb-1">عرف بنفسك</label>
            <textarea name="about_yourself" id="about_yourself" rows="4" required
                class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300">{{ old('about_yourself', $member->about_yourself) }}</textarea>
        </div>

        <!-- حقل تكلم حول شريكك -->
        <div>
            <label for="about_partner" class="block text-gray-700 font-medium mb-1">تكلم حول شريكك</label>
            <textarea name="about_partner" id="about_partner" rows="4" required
                class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300">{{ old('about_partner', $member->about_partner) }}</textarea>
        </div>

        <!-- زر الحفظ -->
        <div class="text-center">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-md shadow">
                حفظ التعديلات
            </button>
        </div>
    </form>
</div>
@endsection
