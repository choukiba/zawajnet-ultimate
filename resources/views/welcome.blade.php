@extends('layouts.app')

@section('content')
<div dir="rtl" class="bg-gray-50 min-h-screen py-10">

    {{-- ✅ العنوان الرئيسي --}}
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">اعثر على نصفك الآخر ❤️</h1>
        <p class="text-gray-600">موقع زواج جاد ومجاني للأعضاء الباحثين عن شريك الحياة</p>
    </div>

    {{-- ✅ نموذج البحث --}}
    <div class="max-w-4xl mx-auto px-4 mb-10">
        <form method="GET" action="{{ route('search') }}" class="flex flex-col md:flex-row gap-4 items-center justify-center">
            <select name="gender" class="w-full md:w-auto p-2 border rounded">
                <option value="">اختر الجنس</option>
                <option value="ذكر">ذكر</option>
                <option value="أنثى">أنثى</option>
            </select>
            <select name="country" class="w-full md:w-auto p-2 border rounded">
                <option value="">اختر الدولة</option>
                <option value="Algeria">الجزائر</option>
                <option value="Tunisia">تونس</option>
                <option value="Morocco">المغرب</option>
            </select>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">بحث</button>
        </form>
    </div>

    {{-- ✅ عرض الأعضاء المميزين --}}
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-xl font-semibold text-gray-700 mb-6 text-center">أعضاء مميزون</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($members as $member)
                <div class="bg-white rounded-lg shadow p-4 text-center">
                    <img src="{{ $member->photo_url ?? asset('images/default-profile.png') }}" alt="عضو" class="w-28 h-28 object-cover rounded-full mx-auto mb-3">
                    <h3 class="text-lg font-bold text-gray-800">{{ $member->name }}</h3>
                    <p class="text-sm text-gray-500">{{ $member->age }} سنة - {{ $member->country }}</p>
                    <a href="{{ route('profile.show', $member->id) }}" class="text-blue-600 hover:underline text-sm mt-2 inline-block">عرض الملف الشخصي</a>
                </div>
            @endforeach
        </div>
    </div>

    {{-- ✅ المزايا --}}
    <div class="max-w-5xl mx-auto px-4 mt-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
            <div class="bg-white p-6 rounded shadow">
                <h3 class="font-bold text-xl mb-2 text-blue-700">عضوية مجانية</h3>
                <p class="text-gray-600">انضم وابدأ رحلتك بدون أي رسوم أولية</p>
            </div>
            <div class="bg-white p-6 rounded shadow">
                <h3 class="font-bold text-xl mb-2 text-blue-700">بحث متقدم</h3>
                <p class="text-gray-600">ابحث حسب العمر، الجنس، الدولة، والمزيد</p>
            </div>
            <div class="bg-white p-6 rounded shadow">
                <h3 class="font-bold text-xl mb-2 text-blue-700">آمن وموثوق</h3>
                <p class="text-gray-600">نضمن الخصوصية التامة وحماية بياناتك</p>
            </div>
        </div>
    </div>

</div>
@endsection

