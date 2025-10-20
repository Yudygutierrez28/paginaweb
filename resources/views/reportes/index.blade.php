@extends('layouts.app')

@section('content')
<h1 class="text-center mt-5">Reporte de Adoptantes</h1>

<div class="flex justify-end mt-4 mb-4 gap-2">
    <a href="{{ route('reportes.pdf') }}" class="bg-green-500 text-white p-2 rounded">Descargar PDF</a>
    <a href="{{ route('reportes.excel') }}" class="bg-blue-500 text-white p-2 rounded">Descargar Excel</a>
</div>

<!-- Tabla -->
<table class="w-full border-collapse border border-gray-400">
    <thead>
        <tr class="bg-gray-200">
            <th class="border p-2">ID</th>
            <th class="border p-2">Nombre</th>
            <th class="border p-2">Apellido</th>
            <th class="border p-2">Email</th>
            <th class="border p-2">Teléfono</th>
        </tr>
    </thead>
    <tbody>
        @foreach($adoptantes as $a)
        <tr>
            <td class="border p-2">{{ $a->id }}</td>
            <td class="border p-2">{{ $a->nombre }}</td>
            <td class="border p-2">{{ $a->apellido }}</td>
            <td class="border p-2">{{ $a->email }}</td>
            <td class="border p-2">{{ $a->telefono ?? '-' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Gráfico -->
<canvas id="chartAdoptantes" class="mt-8"></canvas>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('chartAdoptantes').getContext('2d');
const chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: @json($chartData->pluck('month')),
        datasets: [{
            label: 'Adoptantes por mes',
            data: @json($chartData->pluck('total')),
            backgroundColor: 'rgba(54, 162, 235, 0.7)'
        }]
    },
    options: { responsive: true }
});
</script>
@endsection
