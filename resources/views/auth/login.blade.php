@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-4 text-center">تسجيل الدخول</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-4">
            <label class="block mb-1">البريد الإلكتروني</label>
            <input type="email" name="email" class="w-full border p-2 rounded" required autofocus>
            @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1">كلمة المرور</label>
            <input type="password" name="password" class="w-full border p-2 rounded" required>
            @error('password') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="inline-flex items-center">
                <input type="checkbox" name="remember" class="form-checkbox">
                <span class="ml-2">تذكرني</span>
            </label>
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded">دخول</button>
    </form>
</div>
@endsection

