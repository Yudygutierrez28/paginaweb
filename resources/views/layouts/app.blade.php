<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">

    <div class="min-h-screen">

        {{-- Barra superior: logo + login/registro o usuario autenticado --}}
        <nav class="bg-white shadow p-4 flex justify-between items-center">
            <div>
                <a href="{{ route('mascotas.index') }}" class="text-xl font-bold text-green-700">🐾 Veterinaria</a>
            </div>

            <div>
                @guest
                    {{-- Registrarse --}}
                    <a href="{{ route('usuarios.form') }}" 
                       class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700 transition">
                        Registrarse
                    </a>

                    {{-- Login --}}
                    <a href="{{ route('login') }}" 
                       class="px-4 py-2 text-white bg-green-500 rounded hover:bg-green-700 transition">
                        Login
                    </a>
                @else
                    <span class="mr-4 text-gray-700">Hola, {{ Auth::user()->nombre }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" 
                                class="px-4 py-2 text-white bg-red-500 rounded hover:bg-red-700 transition">
                            Cerrar sesión
                        </button>
                    </form>
                @endguest
            </div>
        </nav>

        {{-- Header de la página --}}
        @hasSection('header')
            <header class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                @yield('header')
            </header>
        @endif

        {{-- Mensajes de sesión --}}
        @if(session('success'))
            <div class="max-w-xl mx-auto mb-6 p-4 bg-green-100 border border-green-400 text-green-800 rounded-lg shadow-md text-center text-lg">
                {{ session('success') }}
            </div>
        @endif

        {{-- Contenido principal --}}
        <main class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @yield('content')
        </main>

    </div>
</body>
</html>