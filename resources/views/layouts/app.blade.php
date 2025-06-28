<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Zawajnet') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans text-gray-800">

    {{-- ✅ شريط التنقل العلوي --}}
    <nav class="bg-blue-700 text-white py-4 shadow">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-xl font-bold">💍 زواج نت</a>
            <div class="space-x-4">
                <a href="{{ route('register') }}" class="bg-yellow-400 text-blue-800 px-3 py-1 rounded hover:bg-yellow-300">تسجيل</a>
                <a href="#" class="px-3 py-1 hover:underline">دخول</a>
            </div>
        </div>
    </nav>

    {{-- ✅ محتوى الصفحة --}}
    <main class="py-10">
        @yield('content')
    </main>

    {{-- ✅ تذييل --}}
    <footer class="bg-gray-200 text-center py-4 mt-10 text-sm text-gray-600">
        &copy; {{ date('Y') }} Zawajnet - جميع الحقوق محفوظة.
    </footer>

</body>
</html>
