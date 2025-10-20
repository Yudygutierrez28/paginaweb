<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Adoptantes</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Reporte de Adoptantes</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Teléfono</th>
            </tr>
        </thead>
        <tbody>
            @foreach($adoptantes as $a)
            <tr>
                <td>{{ $a->id }}</td>
                <td>{{ $a->nombre }}</td>
                <td>{{ $a->apellido }}</td>
                <td>{{ $a->email }}</td>
                <td>{{ $a->telefono ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
