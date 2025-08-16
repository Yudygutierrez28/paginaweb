@extends('layouts.app')

@section('title', 'Registro de Usuario')

@section('content')
<div class="max-w-md mx-auto bg-white shadow-md rounded p-6">
    <h2 class="text-2xl font-bold mb-4">Registro</h2>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('usuarios.registrar') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block">Nombre</label>
            <input type="text" name="nombre" class="w-full border rounded p-2" required value="{{ old('nombre') }}">
        </div>

        <div class="mb-4">
            <label class="block">Apellido</label>
            <input type="text" name="apellido" class="w-full border rounded p-2" required value="{{ old('apellido') }}">
        </div>

        <div class="mb-4">
            <label class="block">Correo</label>
            <input type="email" name="email" class="w-full border rounded p-2" required value="{{ old('email') }}">
        </div>

        <div class="mb-4">
            <label class="block">Contraseña</label>
            <input type="password" name="password" class="w-full border rounded p-2" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Registrarse
        </button>
    </form>
</div>
@endsection
