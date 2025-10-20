@extends('layouts.app')

@section('title', 'Lista de Adoptantes')

@section('header')
    <div class="text-center mb-8">
        <h1 class="text-4xl font-extrabold text-green-700 drop-shadow-lg">🐾 Adoptantes Registrados</h1>
        <p class="text-lg text-gray-800 mt-2">Aquí puedes ver y gestionar a los adoptantes</p>
    </div>
@endsection

@section('content')

    {{-- Mensaje de éxito --}}
    @if (session('success'))
        <div class="max-w-xl mx-auto mt-6 mb-8 p-4 bg-green-100 border border-green-400 text-green-800 rounded-lg shadow-md text-center text-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="max-w-7xl mx-auto px-6 py-8">

        {{-- Botones superiores --}}
        <div class="flex justify-between mb-6 flex-col md:flex-row gap-4">
            <a href="{{ route('adoptantes.create') }}"
               class="px-6 py-3 bg-blue-500 text-white font-semibold rounded-full hover:bg-blue-700 transition shadow-lg">
               ➕ Agregar Adoptante
            </a>

            <a href="{{ route('adoptantes.pdf') }}"
               class="px-6 py-3 bg-green-600 text-white font-semibold rounded-full hover:bg-green-700 transition shadow-lg">
               📄 Descargar PDF
            </a>
        </div>

        {{-- Tabla de adoptantes --}}
        <div class="overflow-x-auto bg-white shadow-xl rounded-xl">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-green-500 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium">Nombre</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Correo</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Cédula</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Teléfono</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Dirección</th>
                        <th class="px-6 py-3 text-center text-sm font-medium">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($adoptantes as $adoptante)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">{{ $adoptante->nombre }}</td>
                            <td class="px-6 py-4">{{ $adoptante->correo }}</td>
                            <td class="px-6 py-4">{{ $adoptante->cedula }}</td>
                            <td class="px-6 py-4">{{ $adoptante->telefono }}</td>
                            <td class="px-6 py-4">{{ $adoptante->direccion }}</td>
                            <td class="px-6 py-4 text-center flex justify-center gap-2">
                                <a href="{{ route('adoptantes.edit', $adoptante->id) }}"
                                   class="px-4 py-2 bg-yellow-400 text-white rounded-full hover:bg-yellow-500 transition">
                                   ✏️ Editar
                                </a>
                                <form action="{{ route('adoptantes.destroy', $adoptante->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este adoptante?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="px-4 py-2 bg-red-500 text-white rounded-full hover:bg-red-600 transition">
                                        🗑️ Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if ($adoptantes->isEmpty())
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                No hay adoptantes registrados.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

    </div>

@endsection
