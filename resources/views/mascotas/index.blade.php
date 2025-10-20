@extends('layouts.app')

@section('title', 'Mascotas para Apadrinar')

@section('header')
<div class="text-center mb-8">
    {{-- Logo --}}
    <img src="{{ asset('logo.jpg') }}" 
         alt="Logo Veterinaria"
         class="mx-auto w-28 h-28 rounded-full shadow-md hover:scale-105 transition-transform duration-500">

    {{-- Título --}}
    <h1 class="text-4xl font-bold text-green-700 mt-4 drop-shadow-lg animate-pulse">🐾 Mascotas para Apadrinar</h1>
    <p class="text-gray-700 mt-1 text-lg">¡Dales una segunda oportunidad a estos peluditos!</p>

    {{-- Mensaje de bienvenida si el usuario está logueado --}}
    @auth
        <div class="mt-3 p-2 bg-green-100 text-green-800 rounded text-center shadow-lg animate-fadeIn">
            ¡Bienvenido/a, {{ Auth::user()->nombre }}! 🐾
        </div>
    @endauth
</div>
@endsection

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">

    {{-- Botones de autenticación para invitados --}}
    @guest
        <div class="text-center mb-6 space-x-4">
            <a href="{{ route('login') }}"
               class="px-6 py-3 bg-blue-500 text-white rounded-full hover:bg-blue-600 transform hover:scale-105 transition duration-300 shadow-lg font-semibold">
                Iniciar Sesión
            </a>

            <a href="{{ route('usuarios.form') }}"
               class="px-6 py-3 bg-green-500 text-white rounded-full hover:bg-green-600 transform hover:scale-105 transition duration-300 shadow-lg font-semibold">
                Registrarse
            </a>
        </div>
    @endguest

    {{-- Botones de reportes solo para usuarios logueados --}}
    @auth
        <div class="text-center mb-6 space-x-4">
            <a href="{{ route('reportes.pdf') }}"
               class="px-6 py-3 bg-green-500 text-white rounded-full hover:bg-green-700 transition duration-300 shadow-lg">
               Descargar PDF
            </a>

            <a href="{{ route('reportes.excel') }}"
               class="px-6 py-3 bg-blue-500 text-white rounded-full hover:bg-blue-700 transition duration-300 shadow-lg">
               Descargar Excel
            </a>

            <a href="{{ route('reportes.index') }}"
               class="px-6 py-3 bg-gray-500 text-white rounded-full hover:bg-gray-700 transition duration-300 shadow-lg">
               Ver Reporte Web
            </a>
        </div>
    @endauth

    {{-- Botón Agregar Mascota solo para usuarios logueados --}}
    @auth
        <div class="text-right mb-6">
            <a href="{{ route('mascotas.create') }}" 
               class="inline-block px-6 py-3 bg-green-500 text-white font-bold rounded-full hover:bg-green-700 transform hover:scale-105 transition duration-300 shadow-lg animate-bounce">
                ➕ Agregar Mascota
            </a>
        </div>
    @endauth

    {{-- Grid de Mascotas --}}
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($mascotas as $mascota)
            @php
                $rutaImagen = $mascota->imagen
                    ? Storage::url($mascota->imagen)
                    : asset('placeholder.jpg');
            @endphp

            <div class="bg-white border border-green-200 shadow-lg rounded-xl overflow-hidden flex flex-col hover:scale-105 transition-transform duration-300">
                <img src="{{ $rutaImagen }}" alt="{{ $mascota->nombre }}" class="w-full h-48 object-cover">

                <div class="p-4 flex-1 flex flex-col justify-between">
                    <div>
                        <h2 class="text-xl font-bold text-green-800">{{ $mascota->nombre }}</h2>
                        <p class="text-sm text-gray-600"><strong>Raza:</strong> {{ $mascota->raza }}</p>
                        <p class="text-sm text-gray-700 mt-1">{{ $mascota->descripcion }}</p>
                    </div>

                    <div class="mt-3 flex flex-wrap justify-center gap-2">
                        <a href="{{ route('apadrinacion.create', $mascota->id) }}"
                           class="px-4 py-2 bg-green-600 text-white rounded-full hover:bg-green-700 transform hover:scale-105 transition duration-300 shadow">🐶 Apadrinar</a>

                        @auth
                            <a href="{{ route('mascotas.edit', $mascota->id) }}"
                               class="px-4 py-2 bg-yellow-400 text-white rounded-full hover:bg-yellow-500 transform hover:scale-105 transition duration-300 shadow">✏️ Editar</a>

                            <form action="{{ route('mascotas.destroy', $mascota->id) }}" method="POST" 
                                  onsubmit="return confirm('¿Estás seguro de eliminar esta mascota?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="px-4 py-2 bg-red-500 text-white rounded-full hover:bg-red-600 transform hover:scale-105 transition duration-300 shadow">🗑️ Eliminar</button>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
