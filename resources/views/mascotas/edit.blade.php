@extends('layouts.app')

@section('title', 'Editar Mascota')

@section('content')
    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-4">Editar Mascota</h2>

        <form action="{{ route('mascotas.update', $mascota->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="text" name="nombre" value="{{ $mascota->nombre }}" class="w-full mb-3 p-2 border rounded" required>
            <input type="text" name="raza" value="{{ $mascota->raza }}" class="w-full mb-3 p-2 border rounded" required>
            <textarea name="descripcion" class="w-full mb-3 p-2 border rounded" required>{{ $mascota->descripcion }}</textarea>
            <input type="file" name="imagen" class="w-full mb-3">

            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Actualizar</button>
        </form>
    </div>
@endsection