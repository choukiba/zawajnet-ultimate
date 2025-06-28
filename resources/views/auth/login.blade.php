@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto py-12 px-4" dir="rtl">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">تسجيل الدخول</h2>

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 p-3 mb-4 rounded">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="bg-white p-6 rounded shadow">
        @csrf

        {{-- البريد الإلكتروني --}}
        <div class="mb-4">
            <label for="email" class="block font-semibold mb-1">البريد الإلكتروني</label>
            <input type="email" name="email" id="email"
                   class="w-full p-2 border rounded" value="{{ old('email') }}" required autofocus>
        </div>

        {{-- كلمة المرور --}}
        <div class="mb-4">
            <label for="password" class="block font-semibold mb-1">كلمة المرور</label>
            <input type="password" name="password" id="password"
                   class="w-full p-2 border rounded" required>
        </div>

        {{-- تذكرني --}}
        <div class="mb-4 flex items-center">
            <input type="checkbox" name="remember" id="remember" class="mr-2">
            <label for="remember" class="text-sm">تذكرني</label>
        </div>

        {{-- زر الدخول --}}
        <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded font-semibold">
            تسجيل الدخول
        </button>
    </form>
</div>
@endsection
