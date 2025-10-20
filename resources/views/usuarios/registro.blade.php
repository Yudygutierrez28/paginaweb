@extends('layouts.app')

@section('title', 'Registro de Usuario')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white shadow-lg rounded-lg p-8">

    <h2 class="text-2xl font-bold text-center text-green-700 mb-6">Registro de Usuario</h2>

    {{-- Mensaje de éxito --}}
    @if (session('success'))
        <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Errores de validación --}}
    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-800 rounded">
            <ul class="list-disc pl-4">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('usuarios.registrar') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="nombre" class="block font-semibold text-gray-700">Nombre</label>
            <input type="text" id="nombre" name="nombre"
                   class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-green-300"
                   value="{{ old('nombre') }}" required>
        </div>

        <div>
            <label for="apellido" class="block font-semibold text-gray-700">Apellido</label>
            <input type="text" id="apellido" name="apellido"
                   class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-green-300"
                   value="{{ old('apellido') }}" required>
        </div>

        <div>
            <label for="email" class="block font-semibold text-gray-700">Correo Electrónico</label>
            <input type="email" id="email" name="email"
                   class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-green-300"
                   value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="password" class="block font-semibold text-gray-700">Contraseña</label>
            <input type="password" id="password" name="password"
                   class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-green-300"
                   required>
        </div>

        <div class="text-center">
            <button type="submit"
                    class="w-full px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                Registrarse
            </button>
        </div>
    </form>
</div>
@endsection
