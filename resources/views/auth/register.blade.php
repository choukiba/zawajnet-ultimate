@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-8 rounded shadow text-right">
    <h2 class="text-2xl font-bold mb-6 text-center">إنشاء حساب جديد</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- الاسم الكامل --}}
        <input type="text" name="name" placeholder="الاسم الكامل" class="w-full mb-4 p-2 border rounded">

        {{-- البريد الإلكتروني --}}
        <input type="email" name="email" placeholder="البريد الإلكتروني" class="w-full mb-4 p-2 border rounded">

        {{-- كلمة المرور --}}
        <input type="password" name="password" placeholder="كلمة المرور" class="w-full mb-4 p-2 border rounded">

        {{-- تأكيد كلمة المرور --}}
        <input type="password" name="password_confirmation" placeholder="تأكيد كلمة المرور" class="w-full mb-4 p-2 border rounded">

        {{-- الجنس --}}
        <select name="gender" class="w-full mb-4 p-2 border rounded">
            <option selected disabled>اختر الجنس</option>
            <option value="ذكر">ذكر</option>
            <option value="أنثى">أنثى</option>
        </select>

        {{-- الدولة --}}
        <select name="country" id="country" class="w-full mb-4 p-2 border rounded">
            <option selected disabled>اختر الدولة</option>
            @foreach($countries as $country)
                <option value="{{ $country->id }}">{{ $country->name_ar }}</option>
            @endforeach
        </select>

        {{-- المدينة --}}
        <select name="city" id="city" class="w-full mb-4 p-2 border rounded">
            <option selected disabled>اختر المدينة</option>
        </select>

        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">إنشاء الحساب</button>
    </form>
</div>

{{-- ✅ كود JavaScript لتحميل المدن --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const countrySelect = document.querySelector('select[name="country"]');
        const citySelect = document.querySelector('select[name="city"]');

        countrySelect.addEventListener('change', function () {
            const countryId = this.value;
            if (countryId) {
                fetch(`/cities/${countryId}`)
                    .then(response => response.json())
                    .then(data => {
                        citySelect.innerHTML = '<option selected disabled>اختر المدينة</option>';
                        data.forEach(city => {
                            const option = document.createElement('option');
                            option.value = city.name_ar;
                            option.textContent = city.name_ar;
                            citySelect.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('خطأ في تحميل المدن:', error);
                        citySelect.innerHTML = '<option>حدث خطأ في تحميل المدن</option>';
                    });
            } else {
                citySelect.innerHTML = '<option>اختر المدينة</option>';
            }
        });
    });
</script>


@endsection



