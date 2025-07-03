<nav class="bg-white shadow px-6 py-4 flex justify-between items-center">
    <a href="{{ url('/') }}" class="text-2xl font-bold text-blue-600">
        Zawajnet
    </a>

    <div class="space-x-4 rtl:space-x-reverse">
        @auth
            <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-600">لوحة التحكم</a>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="text-gray-700 hover:text-red-500">تسجيل الخروج</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600">تسجيل الدخول</a>
            <a href="{{ route('register') }}" class="text-white bg-blue-600 px-3 py-1 rounded-md hover:bg-blue-700">إنشاء حساب</a>
        @endauth
    </div>
</nav>
