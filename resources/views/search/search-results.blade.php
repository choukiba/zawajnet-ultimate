@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white shadow-lg mt-10 rounded-xl" dir="rtl">
    <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">نتائج البحث 🔍</h1>

    @if($members->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($members as $member)
                <div class="bg-gray-50 rounded-2xl shadow-lg p-6 hover:shadow-xl transition duration-300">
                    {{-- صورة العضو --}}
                    <img src="{{ $member->photo ?? asset('images/default-profile.png') }}"
                         alt="{{ $member->name }}"
                         class="w-48 h-48 object-cover rounded-2xl mx-auto mb-6 shadow-md border border-gray-200">

                    {{-- معلومات العضو --}}
                    <h2 class="text-xl font-bold text-blue-800 text-center mb-2">{{ $member->name }}</h2>
                    
                    <div class="text-sm text-gray-600 space-y-1 text-center">
                        <p>👤 الجنس: <span class="font-medium text-gray-800">{{ $member->gender }}</span></p>
                        <p>🎂 العمر: <span class="font-medium text-gray-800">{{ $member->age }}</span></p>
                        <p>🌍 الدولة: <span class="font-medium text-gray-800">{{ $member->country }}</span></p>
                    </div>

                    {{-- زر عرض الملف الشخصي --}}
                    <div class="mt-6 text-center">
                        <a href="{{ route('profile.show', $member->id) }}"
                           class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-xl transition">
                            👁️ عرض الملف
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-600 text-center mt-10">⚠️ لم يتم العثور على نتائج تطابق البحث.</p>
    @endif
</div>
@endsection
