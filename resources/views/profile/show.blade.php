@extends('layouts.app')

@section('content')
<div class="bg-white py-10" dir="rtl">
    <div class="max-w-4xl mx-auto px-6">
        {{-- ✅ عنوان الصفحة --}}
        <h2 class="text-3xl font-bold text-center text-blue-800 mb-6">الملف الشخصي</h2>

        {{-- ✅ صندوق معلومات العضو --}}
        <div class="bg-gray-100 rounded-xl p-6 shadow-md flex flex-col md:flex-row gap-8 items-center">
            {{-- ✅ صورة العضو --}}
            <div class="w-40 h-40">
                <img src="{{ asset('images/default-avatar.png') }}" alt="الصورة الشخصية" class="rounded-full w-full h-full object-cover shadow">
            </div>

            {{-- ✅ بيانات العضو --}}
            <div class="flex-1 text-right">
                <h3 class="text-2xl font-semibold text-gray-800 mb-2">{{ $member->name }}</h3>
                <p class="text-gray-600"><strong>البريد:</strong> {{ $member->email }}</p>
                <p class="text-gray-600"><strong>الجنس:</strong> {{ $member->gender }}</p>
                <p class="text-gray-600"><strong>العمر:</strong> {{ $member->age }} سنة</p>
                <p class="text-gray-600"><strong>الدولة:</strong> {{ $member->country }}</p>
                <p class="text-gray-600"><strong>نوع الزواج:</strong> {{ $member->marriage_type ?? 'غير محدد' }}</p>
                <p class="text-gray-600"><strong>العضوية المميزة:</strong> {{ $member->is_premium ? 'نعم' : 'لا' }}</p>
            </div>
        </div>

        {{-- ✅ زر رجوع --}}
        <div class="text-center mt-8">
            <a href="{{ route('home') }}" class="bg-blue-700 hover:bg-blue-800 text-white py-2 px-6 rounded-lg shadow transition">العودة للرئيسية</a>
        </div>
    </div>
</div>
@endsection
