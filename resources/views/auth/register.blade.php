@extends('layouts.app')

@section('content')
<div class="container" dir="rtl">
    <h2 class="text-center font-bold text-2xl mb-6">إنشاء حساب جديد</h2>

    <form method="POST" action="{{ route('register') }}" class="max-w-md mx-auto space-y-4">
        @csrf

        <input type="text" name="name" placeholder="الاسم الكامل" class="form-input w-full" required>
        <input type="email" name="email" placeholder="البريد الإلكتروني" class="form-input w-full" required>
        <input type="password" name="password" placeholder="كلمة المرور" class="form-input w-full" required>
        <input type="password" name="password_confirmation" placeholder="تأكيد كلمة المرور" class="form-input w-full" required>

        <select name="gender" class="form-select w-full" required>
            <option value="">اختر الجنس</option>
            <option value="ذكر">ذكر</option>
            <option value="أنثى">أنثى</option>
        </select>

        <select name="country_id" class="form-select w-full" required>
            <option value="">اختر الدولة</option>
            @foreach ($countries as $country)
                <option value="{{ $country->id }}">{{ $country->name_ar }}</option>
            @endforeach
        </select>

        <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded w-full">
            إنشاء الحساب
        </button>
    </form>
</div>
@endsection