@extends('layouts.app')

@section('content')
<div class="bg-gray-50 py-12" dir="rtl">

    {{-- ✅ عنوان رئيسي --}}
    <div class="text-center mb-10">
        <h1 class="text-4xl md:text-5xl font-bold text-blue-800 leading-tight mb-4">اعثر على نصفك الآخر ❤️</h1>
        <p class="text-gray-600 text-lg">منصة زواج شرعي وآمن للعرب والمسلمين حول العالم</p>
    </div>

    {{-- ✅ نموذج البحث --}}
    <form method="GET" action="{{ route('search') }}"
          class="bg-white rounded-xl shadow p-6 max-w-4xl mx-auto mb-12 flex flex-col md:flex-row items-center gap-4">

        <select name="gender" class="p-2 border rounded w-full md:w-auto">
            <option value="">الجنس</option>
            <option value="ذكر">ذكر</option>
            <option value="أنثى">أنثى</option>
        </select>

        <input type="number" name="age" placeholder="العمر" class="p-2 border rounded w-full md:w-auto">

        <input type="text" name="country" placeholder="الدولة" class="p-2 border rounded w-full md:w-auto">

        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded">
            🔍 بحث
        </button>
    </form>

    {{-- ✅ الأعضاء المميزون --}}
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">الأعضاء المميزون 💎</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            @foreach ($featuredMembers as $member)
                <div class="bg-white p-4 rounded-lg shadow text-center">
                    <img src="{{ asset('images/default-avatar.png') }}" alt="Avatar"
                         class="w-24 h-24 mx-auto rounded-full mb-3">
                    <h3 class="font-semibold text-blue-700">{{ $member->name }}</h3>
                    <p class="text-sm text-gray-600">{{ $member->country }} - {{ $member->age }} سنة</p>
                    <a href="{{ route('profile.show', $member->id) }}"
                       class="text-sm text-blue-500 hover:underline mt-2 inline-block">عرض الملف الشخصي</a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

