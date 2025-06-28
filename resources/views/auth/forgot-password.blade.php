@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100" dir="rtl">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
        <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">استعادة كلمة المرور</h2>

        @if (session('status'))
            <div class="mb-4 text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- البريد الإلكتروني -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">البريد الإلكتروني</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                @error('email')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- زر إرسال -->
            <div class="mb-4">
                <button type="submit"
                        class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-md">
                    إرسال رابط استعادة كلمة المرور
                </button>
            </div>

            <div class="text-center text-sm text-gray-600">
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline">العودة لتسجيل الدخول</a>
            </div>
        </form>
    </div>
</div>
@endsection
