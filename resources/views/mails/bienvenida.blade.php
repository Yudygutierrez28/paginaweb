<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>¡Gracias por unirte!</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
            color: #333;
        }

        .container {
            background-color: #ffffff;
            max-width: 600px;
            margin: auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .logo {
            width: 120px;
            margin-bottom: 20px;
        }

        h1 {
            color: #4CAF50;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .footer {
            font-size: 12px;
            color: #888;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Imagen del logo -->
        <img src="https://i.postimg.cc/sgHnmDSm/logoveterinaria.webp" alt="Logo de la Veterinaria" class="logo">

        <h1>¡Bienvenido/a, {{ $usuario->nombre }}! 🐾</h1>

        <p>Gracias por registrarte en nuestra plataforma.</p>

        <p>Con tu apoyo, damos un paso más hacia un mundo donde cada mascota tenga un hogar lleno de amor. 🏡</p>

        <p>Adoptar o apadrinar no solo cambia la vida de una mascota, ¡también transforma la tuya! ❤️</p>

        <p>¡Gracias por ser parte de esta hermosa causa!</p>

        <div class="footer">
            Este mensaje fue enviado automáticamente. Por favor, no respondas a este correo.
        </div>
    </div>
</body>
</html>


