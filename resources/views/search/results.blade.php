@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white shadow-lg mt-10 rounded" dir="rtl">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">نتائج البحث 🔍</h1>

    @if($members->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($members as $member)
                <div class="border rounded p-4 shadow hover:shadow-lg transition">
                    <h2 class="text-xl font-semibold text-blue-700">{{ $member->name }}</h2>
                    <p>👤 الجنس: {{ $member->gender }}</p>
                    <p>🎂 العمر: {{ $member->age }}</p>
                    <p>🌍 الدولة: {{ $member->country }}</p>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-600 text-center">لم يتم العثور على نتائج تطابق البحث.</p>
    @endif
</div>
@endsection
