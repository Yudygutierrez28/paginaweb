@extends('layouts.app')

@section('title', 'Agregar Mascota')

@section('content')
    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-4">Agregar Nueva Mascota</h2>

        <form action="{{ route('mascotas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="text" name="nombre" placeholder="Nombre" class="w-full mb-3 p-2 border rounded" required>
            <input type="text" name="raza" placeholder="Raza" class="w-full mb-3 p-2 border rounded" required>
            <textarea name="descripcion" placeholder="Descripción" class="w-full mb-3 p-2 border rounded" required></textarea>
            <input type="file" name="imagen" class="w-full mb-3">

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Guardar</button>
        </form>
    </div>
@endsection