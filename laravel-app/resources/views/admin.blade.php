<!-- admin.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscribify | Panel-Administrador</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>
    <div class="container text-center principal">
        <h1>Panel de Administración
            <a href="{{ url('home') }}" class="btn btn-primary button-cerrar">Cerrar sesión</a>
        </h1>
        <div class="buttons-container m-100">
            <a href="{{ route('crearActo') }}" class="btn btn-primary button-crear-evento">AÑADIR EVENTO</a>
            <a href="{{ route('confActo') }}" class="btn btn-primary button-configurar-evento">CONFIGURAR EVENTO</a>
        </div>
    </div>
</body>