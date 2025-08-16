@extends('layouts.app')

@section('title', 'Formulario de Apadrinamiento')
@section('header', 'Apadrinar a ' . $mascota->nombre)

@section('content')
    <div class="bg-white rounded-xl shadow p-6">
        <form action="{{ route('apadrinar.store') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="mascota_id" value="{{ $mascota->id }}">

            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre completo</label>
                <input type="text" name="nombre" id="nombre" required
                    class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div>
                <label for="correo" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                <input type="email" name="correo" id="correo" required
                    class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    placeholder="tuemail@ejemplo.com">
            </div>

            <div>
                <label for="cedula" class="block text-sm font-medium text-gray-700">Cédula</label>
                <input type="text" name="cedula" id="cedula" required
                    class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div>
                <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono</label>
                <input type="text" name="telefono" id="telefono" required
                    class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div>
                <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección</label>
                <input type="text" name="direccion" id="direccion" required
                    class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div>
                <label for="monto" class="block text-sm font-medium text-gray-700">Monto mínimo</label>
                <input type="number" name="monto" id="monto" value="{{ old('monto', $monto_minimo) }}" required
                    class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div>
                <label for="tiempo_consignacion" class="block text-sm font-medium text-gray-700">Tiempo de consignación</label>
                <select name="tiempo_consignacion" id="tiempo_consignacion" required
                    class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @php
                        $opciones = ['Mensual', 'Trimestral', 'Semestral', 'Anual'];
                    @endphp
                    @foreach ($opciones as $opcion)
                        <option value="{{ $opcion }}" {{ old('tiempo_consignacion', $tiempo) === $opcion ? 'selected' : '' }}>
                            {{ $opcion }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="pt-4">
                <button type="submit"
                    class="w-full md:w-auto px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    Confirmar Apadrinamiento
                </button>
            </div>
        </form>
    </div>
@endsection
