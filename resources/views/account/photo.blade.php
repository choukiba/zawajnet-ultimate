@extends('layouts.app')

@section('content')
<div class="bg-white py-12" dir="rtl">
    <div class="max-w-xl mx-auto px-6">

        {{-- ✅ العنوان --}}
        <h2 class="text-3xl font-bold text-blue-700 mb-6 text-center">🖼️ إدارة الصورة الشخصية</h2>

        {{-- ✅ عرض الصورة الحالية --}}
        <div class="mb-6 text-center">
            @if(auth()->user()->photo)
                <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="الصورة الشخصية" class="mx-auto w-40 h-40 rounded-full shadow-md object-cover">
            @else
                <p class="text-gray-600">لا توجد صورة شخصية حالياً.</p>
            @endif
        </div>

        {{-- ✅ رفع صورة جديدة --}}
        <form action="{{ route('account.photo.upload') }}" method="POST" enctype="multipart/form-data" class="bg-gray-50 p-6 rounded-xl shadow-md space-y-5">
            @csrf
            <div>
                <label class="block mb-1 font-medium">📁 اختر صورة جديدة (jpg, png, max 2MB)</label>
                <input type="file" name="photo" accept="image/*" class="w-full border rounded p-2" required>
            </div>

            <div class="text-center">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition">
                    رفع الصورة
                </button>
            </div>
        </form>

        {{-- ✅ حذف الصورة --}}
        @if(auth()->user()->photo)
        <form action="{{ route('account.photo.delete') }}" method="POST" class="mt-6 text-center">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 hover:underline">🗑️ حذف الصورة الحالية</button>
        </form>
        @endif
    </div>
</div>
@endsection
