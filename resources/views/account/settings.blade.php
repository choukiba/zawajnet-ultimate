@extends('layouts.app')

@section('content')
<div class="bg-white py-12" dir="rtl">
    <div class="max-w-xl mx-auto px-6">
        {{-- ✅ عنوان الصفحة --}}
        <h2 class="text-3xl font-bold text-blue-700 mb-6 text-center">⚙️ إعدادات الحساب</h2>

        {{-- ✅ تغيير البريد الإلكتروني --}}
        <form method="POST" action="{{ route('account.update.email') }}" class="bg-gray-50 p-6 rounded-xl shadow-md mb-10 space-y-5">
            @csrf
            @method('PUT')

            <h3 class="text-xl font-semibold text-gray-800 mb-3">📧 تغيير البريد الإلكتروني</h3>

            <div>
                <label class="block mb-1 font-medium">البريد الإلكتروني الجديد</label>
                <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" class="w-full border rounded p-2" required>
            </div>

            <div class="text-center">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                    تحديث البريد
                </button>
            </div>
        </form>

        {{-- ✅ تغيير كلمة المرور --}}
        <form method="POST" action="{{ route('account.update.password') }}" class="bg-gray-50 p-6 rounded-xl shadow-md space-y-5">
            @csrf
            @method('PUT')

            <h3 class="text-xl font-semibold text-gray-800 mb-3">🔒 تغيير كلمة المرور</h3>

            <div>
                <label class="block mb-1 font-medium">كلمة المرور الحالية</label>
                <input type="password" name="current_password" class="w-full border rounded p-2" required>
            </div>

            <div>
                <label class="block mb-1 font-medium">كلمة المرور الجديدة</label>
                <input type="password" name="new_password" class="w-full border rounded p-2" required>
            </div>

            <div>
                <label class="block mb-1 font-medium">تأكيد كلمة المرور</label>
                <input type="password" name="new_password_confirmation" class="w-full border rounded p-2" required>
            </div>

            <div class="text-center">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition">
                    تحديث كلمة المرور
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
