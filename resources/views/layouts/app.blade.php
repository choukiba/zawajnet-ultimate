<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zawajnet</title>

    <!-- ✅ Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- ✅ Tailwind CSS via Vite -->
    @vite('resources/css/app.css')
    @livewireStyles

    <style>
        :root {
            --font-cairo: 'Cairo', sans-serif;
        }
    </style>
</head>
<body class="bg-white text-gray-800" style="font-family: var(--font-cairo);">

    @include('layouts.navbar')

    <main class="font-[Cairo]">
        @yield('content')
    </main>

    @include('layouts.footer')

    @vite('resources/js/app.js')
    @livewireScripts
</body>
</html>
