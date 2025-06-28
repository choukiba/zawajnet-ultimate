@extends('layouts.app')

@section('content')
<div class="bg-gray-50 py-12 text-center" dir="rtl">

    {{-- ✅ العنوان الرئيسي --}}
    <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4 leading-tight">
        اعثر على نصفك الآخر ❤️
    </h1>
    <p class="text-gray-600 text-lg mb-8">
        موقع زواج جاد ومجاني للأعضاء الباحثين عن شريك الحياة
    </p>

    {{-- ✅ صورة البانر --}}
    <div class="mb-10">
        <img src="{{ asset('images/banner.png') }}"
             alt="Banner"
             class="mx-auto w-full max-w-5xl h-auto rounded-xl shadow">
    </div>

    {{-- ✅ نموذج البحث --}}
    <form method="GET" action="{{ route('search') }}"
          class="flex flex-col md:flex-row justify-center items-center gap-4 px-4 max-w-4xl mx-auto mb-12">

        {{-- الجنس --}}
        <select name="gender"
                class="text-sm p-2 rounded border border-gray-300 focus:ring focus:outline-none">
            <option value="">اختر الجنس</option>
            <option value="male">ذكر</option>
            <option value="female">أنثى</option>
        </select>

        {{-- العمر --}}
        <input type="number" name="age"
               placeholder="العمر"
               class="text-sm p-2 rounded border border-gray-300 focus:ring focus:outline-none">

        {{-- الدولة --}}
        <input type="text" name="country"
               placeholder="الدولة"
               class="text-sm p-2 rounded border border-gray-300 focus:ring focus:outline-none">

        {{-- زر البحث --}}
        <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            بحث
        </button>
    </form>

    {{-- ✅ الأعضاء المميزون --}}
    <div class="mt-8 px-4 max-w-6xl mx-auto">
        <h2 class="text-2xl font-bold text-blue-700 mb-6">أعضاء مميزون</h2>

        @if ($members->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                @foreach ($members as $member)
                    <div class="bg-white p-4 rounded-xl shadow text-right">
                        <h3 class="font-semibold text-lg text-gray-800">{{ $member->name }}</h3>
                        <p class="text-sm text-gray-500">العمر: {{ $member->age }}</p>
                        <p class="text-sm text-gray-500">الدولة: {{ $member->country }}</p>
                        <a href="{{ route('profile.show', $member->id) }}"
                           class="text-blue-600 hover:underline text-sm mt-2 inline-block">
                            عرض الملف الشخصي
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-600">لا يوجد أعضاء مميزون حالياً.</p>
        @endif
    </div>

</div>
@endsection
