<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
</head>
<body>
    <h1>Registrarse</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <label>Nombre:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Contraseña:</label><br>
        <input type="password" name="password" required><br><br>

        <label>Confirmar contraseña:</label><br>
        <input type="password" name="password_confirmation" required><br><br>

        <button type="submit">Registrarse</button>
    </form>
</body>
</html>
