@extends('layouts.app')

@section('content')
    <div class="text-center mb-10">
        <h1 class="text-4xl font-bold text-blue-700 mb-2">اعثر على نصفك الآخر ❤️</h1>
        <p class="text-gray-600">موقع زواج جاد ومجاني للأعضاء الباحثين عن شريك الحياة</p>
    </div>

    <div class="max-w-md mx-auto bg-white shadow p-6 mb-10">
        <form method="GET" action="{{ route('search') }}" class="grid gap-4">
            <select name="gender" class="border rounded p-2">
                <option value="">اختر الجنس</option>
                <option value="male">ذكر</option>
                <option value="female">أنثى</option>
            </select>
            <input name="age" type="text" placeholder="العمر" class="border rounded p-2"/>
            <input name="country" type="text" placeholder="الدولة" class="border rounded p-2"/>
            <button type="submit" class="bg-blue-700 text-white py-2 rounded hover:bg-blue-800">
                بحث
            </button>
        </form>
    </div>

    <h2 class="text-2xl font-semibold text-gray-800 mb-6">أعضاء مميزون</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
        @forelse($members as $member)
            <div class="bg-white shadow rounded-lg p-6 text-center">
                <img src="{{ $member->photo ?? asset('images/default-avatar.png') }}" alt="{{ $member->name }}"
                     class="w-32 h-32 rounded-full mx-auto mb-4 object-cover"/>
                <h3 class="text-xl font-semibold mb-1">{{ $member->name }}</h3>
                <p class="text-gray-600">{{ $member->country }} - {{ $member->age }} سنة</p>
                <a href="{{ route('profile.show', $member->id) }}"
                   class="mt-3 inline-block bg-blue-600 text-white py-1 px-3 rounded hover:bg-blue-700">
                    عرض الملف الشخصي
                </a>
            </div>
        @empty
            <p>لا يوجد أعضاء مميزين حاليًا.</p>
        @endforelse
    </div>
@endsection
