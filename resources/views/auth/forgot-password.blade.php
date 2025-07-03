<!-- ✅ forgot-password.blade.php -->
<x-guest-layout>
    <div class="max-w-md mx-auto mt-12 p-6 bg-white rounded-2xl shadow" dir="rtl" style="font-family: 'Cairo', sans-serif;">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">استعادة كلمة المرور</h2>

        @if (session('status'))
            <div class="mb-4 text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block mb-1 text-sm font-medium text-gray-700">البريد الإلكتروني</label>
                <input id="email" type="email" name="email" required autofocus class="w-full p-2 border rounded focus:outline-none focus:ring focus:border-blue-500">
                @error('email')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>

            <div class="flex items-center justify-end">
                <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded transition">
                    إرسال رابط الاستعادة
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>


<!-- ✅ login.blade.php -->
<x-guest-layout>
    <div class="max-w-md mx-auto mt-12 p-6 bg-white rounded-2xl shadow" dir="rtl" style="font-family: 'Cairo', sans-serif;">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">تسجيل الدخول</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block mb-1 text-sm font-medium text-gray-700">البريد الإلكتروني</label>
                <input id="email" type="email" name="email" required autofocus class="w-full p-2 border rounded focus:outline-none focus:ring focus:border-blue-500">
                @error('email')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block mb-1 text-sm font-medium text-gray-700">كلمة المرور</label>
                <input id="password" type="password" name="password" required class="w-full p-2 border rounded focus:outline-none focus:ring focus:border-blue-500">
                @error('password')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>

            <div class="mb-4 flex justify-between items-center">
                <label class="inline-flex items-center text-sm">
                    <input type="checkbox" name="remember" class="mr-2">
                    تذكرني
                </label>

                <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">نسيت كلمة المرور؟</a>
            </div>

            <div class="mt-4">
                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded transition">
                    دخول
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>


<!-- ✅ register.blade.php -->
<x-guest-layout>
    <div class="max-w-md mx-auto mt-12 p-6 bg-white rounded-2xl shadow" dir="rtl" style="font-family: 'Cairo', sans-serif;">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">إنشاء حساب جديد</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="block mb-1 text-sm font-medium text-gray-700">الاسم الكامل</label>
                <input id="name" type="text" name="name" required autofocus class="w-full p-2 border rounded focus:outline-none focus:ring focus:border-blue-500">
                @error('name')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block mb-1 text-sm font-medium text-gray-700">البريد الإلكتروني</label>
                <input id="email" type="email" name="email" required class="w-full p-2 border rounded focus:outline-none focus:ring focus:border-blue-500">
                @error('email')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block mb-1 text-sm font-medium text-gray-700">كلمة المرور</label>
                <input id="password" type="password" name="password" required class="w-full p-2 border rounded focus:outline-none focus:ring focus:border-blue-500">
                @error('password')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block mb-1 text-sm font-medium text-gray-700">تأكيد كلمة المرور</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required class="w-full p-2 border rounded focus:outline-none focus:ring focus:border-blue-500">
            </div>

            <div class="mt-4">
                <button class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded transition">
                    إنشاء الحساب
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
