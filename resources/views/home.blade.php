@extends('layouts.app')

@section('content')
<div class="bg-white text-gray-800" dir="rtl">

    {{-- ✅ صورة البانر --}}
    <div class="relative">
        <img src="{{ asset('images/banner.jpg') }}" alt="Banner"
             class="w-full h-[500px] object-cover brightness-75">

        {{-- ✅ نموذج البحث --}}
        <form method="GET" action="{{ route('search') }}"
              class="absolute top-1/2 right-8 transform -translate-y-1/2 bg-white/90 backdrop-blur-sm p-4 rounded-xl shadow-lg space-y-3 w-[270px] text-sm">

            {{-- الجنس + العمر --}}
            <div class="flex gap-2">
                <select name="gender" class="flex-1 p-2 rounded-md border text-black bg-white shadow-sm">
                    <option value="">الجنس</option>
                    <option value="ذكر">ذكر</option>
                    <option value="أنثى">أنثى</option>
                </select>

                <select name="age" class="flex-1 p-2 rounded-md border text-black bg-white shadow-sm">
                    <option value="">العمر</option>
                    @for ($i = 18; $i <= 60; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            {{-- الدولة --}}
            <div class="flex gap-2">
                <select name="country" class="flex-1 p-2 rounded-md border text-black bg-white shadow-sm">
                    <option value="">الدولة</option>
                    @foreach($countries as $country)
                        <option value="{{ $country }}">{{ $country }}</option>
                    @endforeach
                </select>
            </div>

            {{-- زر البحث --}}
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 rounded-md shadow">
                بحث
            </button>
        </form>

        {{-- ✅ عدد المتصلين --}}
        <div class="absolute bottom-4 right-8 bg-white text-gray-700 text-sm px-4 py-1 rounded-full shadow">
            عدد الأعضاء المتصلين الآن: {{ $onlineMembersCount }}
        </div>
    </div>

    {{-- ✅ الأعضاء المميزون --}}
    <div class="text-center py-12">
        <h2 class="text-xl font-bold mb-6">الأعضاء المميزون</h2>

        @if($featuredMembers->count())
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 max-w-6xl mx-auto px-4">
                @foreach($featuredMembers as $member)
                    <div class="bg-white border rounded-xl shadow p-3 text-center">
                        <img src="{{ $member->photo ?? asset('images/default-avatar.png') }}"
                             alt="Member"
                             class="w-24 h-24 rounded-full mx-auto mb-2 object-cover">
                        <h3 class="font-semibold">{{ $member->name }}</h3>
                        <p class="text-sm text-gray-600">{{ $member->age }} سنة - {{ $member->country }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500">لا يوجد أعضاء مميزون حالياً</p>
        @endif
    </div>

    {{-- ✅ مزايا التسجيل --}}
    <div class="bg-gray-100 py-12">
        <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6 px-4 text-center">
            <div class="bg-white p-6 rounded-xl shadow">
                <i class="fa-solid fa-heart text-3xl text-blue-600 mb-4"></i>
                <h3 class="text-lg font-bold mb-2">عضوية مجانية</h3>
                <p class="text-sm text-gray-600">سجل مجاناً وابدأ في البحث عن شريك حياتك</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow">
                <i class="fa-solid fa-magnifying-glass text-3xl text-blue-600 mb-4"></i>
                <h3 class="text-lg font-bold mb-2">بحث متقدم</h3>
                <p class="text-sm text-gray-600">ابحث باستخدام معايير دقيقة للحصول على نتائج أفضل</p>
            </div>
        </div>
    </div>
</div>
@endsection

