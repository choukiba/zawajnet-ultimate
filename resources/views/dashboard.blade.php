@extends('layouts.app')

@section('content')
<div class="py-12 bg-gray-50" dir="rtl">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl rounded-xl p-6">

            {{-- ✅ الترحيب --}}
            <h2 class="text-2xl font-bold text-gray-800 mb-6">👋 مرحبًا {{ Auth::user()->name }}</h2>

            {{-- ✅ الإحصائيات --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="p-4 bg-blue-100 rounded-xl text-center">
                    <h3 class="text-xl font-semibold text-blue-800">العضوية</h3>
                    <p class="text-lg mt-2">
                        @if (Auth::user()->is_premium)
                            <span class="text-green-600 font-bold">مميزة</span>
                        @else
                            <span class="text-gray-600">عادية</span>
                        @endif
                    </p>
                </div>
                <div class="p-4 bg-yellow-100 rounded-xl text-center">
                    <h3 class="text-xl font-semibold text-yellow-800">عدد الرسائل</h3>
                    <p class="text-lg mt-2 font-bold">0</p> {{-- سيتم ربطه لاحقًا --}}
                </div>
            </div>

            {{-- ✅ الإجراءات --}}
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('profile.show', Auth::user()->id) }}"
                   class="px-5 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition">
                    👤 مشاهدة ملفي
                </a>
                <a href="#" class="px-5 py-2 bg-yellow-500 text-white rounded-xl hover:bg-yellow-600 transition">
                    ⚙️ إعدادات الحساب
                </a>
                <a href="#" class="px-5 py-2 bg-red-500 text-white rounded-xl hover:bg-red-600 transition">
                    🚪 تسجيل الخروج
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
