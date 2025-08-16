<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Apadrinamiento')</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">
    <div class="max-w-5xl mx-auto p-6">
        <h1 class="text-3xl font-bold text-blue-600 mb-6">@yield('header')</h1>
        @yield('content')
    </div>
</body>
</html>