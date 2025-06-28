@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-8 rounded-xl shadow mt-10" dir="rtl">

    <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">إنشاء حساب جديد</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- الاسم --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">الاسم الكامل</label>
            <input type="text" name="name" value="{{ old('name') }}" required
                   class="w-full border rounded p-2" placeholder="مثال: أحمد بن خالد">
        </div>

        {{-- البريد الإلكتروني --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">البريد الإلكتروني</label>
            <input type="email" name="email" value="{{ old('email') }}" required
                   class="w-full border rounded p-2" placeholder="example@email.com">
        </div>

        {{-- الجنس --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">الجنس</label>
            <select name="gender" required class="w-full border rounded p-2">
                <option value="">اختر الجنس</option>
                <option value="ذكر">ذكر</option>
                <option value="أنثى">أنثى</option>
            </select>
        </div>

        {{-- العمر --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">العمر</label>
            <input type="number" name="age" value="{{ old('age') }}" required
                   class="w-full border rounded p-2" placeholder="مثال: 30">
        </div>

        {{-- الدولة --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">الدولة</label>
            <input type="text" name="country" value="{{ old('country') }}" required
                   class="w-full border rounded p-2" placeholder="مثال: الجزائر">
        </div>

        {{-- نوع الزواج --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">نوع الزواج (اختياري)</label>
            <input type="text" name="marriage_type" value="{{ old('marriage_type') }}"
                   class="w-full border rounded p-2" placeholder="مثال: زواج دائم / مؤقت">
        </div>

        {{-- كلمة المرور --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">كلمة المرور</label>
            <input type="password" name="password" required
                   class="w-full border rounded p-2">
        </div>

        {{-- تأكيد كلمة المرور --}}
        <div class="mb-6">
            <label class="block font-semibold mb-1">تأكيد كلمة المرور</label>
            <input type="password" name="password_confirmation" required
                   class="w-full border rounded p-2">
        </div>

        {{-- زر التسجيل --}}
        <button type="submit"
                class="w-full bg-blue-600 text-white font-semibold py-2 rounded hover:bg-blue-700">
            إنشاء حساب
        </button>
    </form>
</div>
@endsection
