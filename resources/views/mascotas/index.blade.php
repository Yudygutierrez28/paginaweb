@extends('layouts.app')

@section('title', 'Mascotas para Apadrinar')

@section('header')
    <div class="text-center mb-8">
        {{-- Logo --}}
        <img src="{{ asset('mascotas/logoveterinaria.jpg') }}" alt="Logo"
             class="mx-auto w-24 h-24 mb-4 rounded-full shadow-lg border-4 border-green-500">
        <h1 class="text-4xl font-extrabold text-green-700 drop-shadow-lg">🐾 Mascotas para Apadrinar</h1>
        <p class="text-lg text-gray-800 mt-2">¡Dales una segunda oportunidad a estos peluditos!</p>
    </div>
@endsection

@section('content')

    {{-- Mostrar mensaje de éxito --}}
    @if (session('success'))
        <div class="max-w-xl mx-auto mt-6 mb-8 p-4 bg-green-100 border border-green-400 text-green-800 rounded-lg shadow-md text-center text-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="py-10 px-6 rounded-lg"
         style="background: linear-gradient(to bottom right, #d4fcd7, #ffffff), url('https://images.unsplash.com/photo-1601758123927-1965e51f60f0'); background-size: cover; background-blend-mode: overlay;">

        {{-- Botón Agregar Mascota --}}
        <div class="text-right mb-6">
            <a href="{{ route('mascotas.create') }}"
               class="inline-block px-6 py-2 bg-green-500 text-white font-bold rounded-full hover:bg-green-700 transition">
                ➕ Agregar Mascota
            </a>
        </div>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($mascotas as $mascota)
                @php
                    $rutaImagen = $mascota->imagen
                        ? Storage::url($mascota->imagen)
                        : 'https://via.placeholder.com/240x160?text=Sin+imagen';
                @endphp

                <div class="bg-white border-2 border-green-200 shadow-xl hover:scale-105 transition-transform duration-300 rounded-xl overflow-hidden flex flex-col">
                    <img src="{{ $rutaImagen }}"
                         alt="Imagen de {{ $mascota->nombre }}"
                         class="w-full h-48 object-cover">

                    <div class="p-4 flex-1 flex flex-col justify-between">
                        <div>
                            <h2 class="text-xl font-bold text-green-800">{{ $mascota->nombre }}</h2>
                            <p class="text-sm text-gray-600"><strong>Raza:</strong> {{ $mascota->raza }}</p>
                            <p class="text-sm text-gray-700 mt-2">{{ $mascota->descripcion }}</p>
                        </div>

                        <div class="mt-4 text-center">
                            <a href="{{ url('/apadrinar/' . $mascota->id) }}"
                               class="inline-flex items-center px-5 py-2.5 bg-green-600 text-white font-semibold rounded-full hover:bg-green-700 transition shadow-lg">
                                🐶 Apadrinar
                            </a>
                        </div>

                        {{-- Botones Editar y Eliminar --}}
                        <div class="mt-4 flex justify-center space-x-4">
                            <a href="{{ route('mascotas.edit', $mascota->id) }}"
                               class="px-4 py-2 bg-yellow-400 text-white rounded-full hover:bg-yellow-500 transition">
                                ✏️ Editar
                            </a>

                            <form action="{{ route('mascotas.destroy', $mascota->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta mascota?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-4 py-2 bg-red-500 text-white rounded-full hover:bg-red-600 transition">
                                    🗑️ Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Botón Registrarse centrado --}}
        <div class="text-center mt-10">
            <a href="{{ route('usuarios.form') }}"
               class="px-6 py-3 bg-blue-500 text-white font-semibold rounded-full hover:bg-blue-700 transition">
                Registrarse
            </a>
        </div>

        {{-- Redes Sociales --}}
        <div class="mt-12 text-center">
            <h2 class="text-xl font-semibold text-green-700 mb-4">¡Síguenos en redes!</h2>
            <div class="flex justify-center space-x-6 text-3xl text-green-600">
                <a href="https://facebook.com" target="_blank" class="hover:text-blue-600 transition">
                    <i class="fab fa-facebook"></i>
                </a>
                <a href="https://instagram.com" target="_blank" class="hover:text-pink-500 transition">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://wa.me/1234567890" target="_blank" class="hover:text-green-500 transition">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </div>
        </div>
    </div>
@endsection
