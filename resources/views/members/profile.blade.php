@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-6 bg-white rounded-2xl shadow-lg mt-10" dir="rtl">
    <div class="flex flex-col md:flex-row gap-8 items-center">
        <!-- ✅ الصورة الشخصية -->
        <img src="{{ $member->photo ? asset('storage/' . $member->photo) : asset('images/default.png') }}"
             alt="صورة العضو"
             class="w-40 h-40 object-cover rounded-2xl shadow">

        <!-- ✅ معلومات العضو -->
        <div class="text-gray-800 space-y-2 w-full">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold">{{ $member->name }}</h1>

                @auth
                    @if(auth()->id() === $member->id)
                        <!-- ✅ زر تعديل الملف الشخصي -->
                        <a href="{{ route('profile.edit') }}"
                           class="text-sm bg-yellow-300 hover:bg-yellow-400 px-3 py-1 rounded-lg">
                            ✏️ تعديل الملف
                        </a>
                    @endif
                @endauth
            </div>

            <p>🎂 العمر: {{ $member->age }}</p>
            <p>🌍 الدولة: {{ $member->country }}</p>
            <p>👤 الجنس: {{ $member->gender }}</p>
            <p>💍 نوع الزواج: {{ $member->marriage_type }}</p>

            @if($member->bio)
                <div class="mt-4 bg-gray-50 p-4 rounded-lg text-sm leading-loose">
                    <strong>نبذة:</strong> {{ $member->bio }}
                </div>
            @endif
        </div>
    </div>

    <!-- ✅ أزرار التفاعل للمستخدمين فقط -->
    @auth
        @if(auth()->id() !== $member->id)
            <div class="mt-6 flex flex-wrap gap-4">
                <form action="{{ route('contact.request', $member->id) }}" method="POST">
                    @csrf
                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        💌 إرسال طلب تعارف
                    </button>
                </form>

                <form action="{{ route('follow.member', $member->id) }}" method="POST">
                    @csrf
                    <button type="submit"
                            class="px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400">
                        ⭐ متابعة
                    </button>
                </form>

                <a href="{{ route('report.member', $member->id) }}"
                   class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                    🚩 إبلاغ
                </a>
            </div>
        @endif
    @endauth
</div>
@endsection

