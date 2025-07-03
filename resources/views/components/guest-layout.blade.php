<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Zawajnet') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body style="font-family: 'Cairo', sans-serif;" class="bg-gray-50 text-gray-800">
    <main>
        {{ $slot }}
    </main>
    @vite('resources/js/app.js')
</body>
</html>
