@extends('layouts.app')

@section('title', 'Dashboard')

@section('header')
<div class="text-center mb-8">
    <h1 class="text-3xl font-bold text-green-700">Dashboard</h1>
    <p class="text-gray-700 mt-2 text-lg">
        ¡Bienvenido, {{ Auth::user()->nombre }}!
    </p>
</div>
@endsection

@section('content')
<div class="max-w-7xl mx-auto px-4 py-6">
    <div class="bg-white shadow-md rounded-lg p-6">

        <h2 class="text-xl font-semibold text-green-700 mb-4">Panel de usuario</h2>
        <p class="text-gray-700 mb-4">
            Desde aquí puedes gestionar tus mascotas, apadrinaciones y tu perfil.
        </p>

        {{-- Botones de acción --}}
        <div class="flex flex-wrap gap-4">
            {{-- Ver Mascotas --}}
            <a href="{{ route('mascotas.index') }}"
               class="px-6 py-3 bg-green-500 text-white rounded-full hover:bg-green-700 transform hover:scale-105 transition duration-300 shadow">
                Ver Mascotas
            </a>

            {{-- Agregar Mascota (solo si está autenticado) --}}
            @auth
            <a href="{{ route('mascotas.create') }}"
               class="px-6 py-3 bg-yellow-500 text-white rounded-full hover:bg-yellow-700 transform hover:scale-105 transition duration-300 shadow">
                Agregar Mascota
            </a>
            @endauth

            {{-- Editar Perfil --}}
            <a href="{{ route('profile.edit') }}"
               class="px-6 py-3 bg-blue-500 text-white rounded-full hover:bg-blue-700 transform hover:scale-105 transition duration-300 shadow">
                Editar Perfil
            </a>
        </div>

        {{-- Mensaje de prueba para usuario --}}
        <div class="mt-6 p-4 bg-green-100 text-green-800 rounded shadow-md">
            Estás logueado como: <strong>{{ Auth::user()->email }}</strong>
        </div>

    </div>
</div>
@endsection
