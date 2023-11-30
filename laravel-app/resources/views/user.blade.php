<!DOCTYPE html>
<html lang="es">
<head>
    <title>Calendario con Bootstrap</title>
    
    <link rel="stylesheet" href="{{ asset('css/usuarioVista.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</head>
<body>
    <div class="container">
        <div class="jumbotron mt-3 text-center">
            <h1 class="display-4">CALENDARIO DE {{ $Username }}
                <a href="../../index.php" class="btn btn-primary button-cerrar">Cerrar sesión</a>
            </h1>
            <p class="lead">Correo electrónico: {{ $Email }}</p>

            <form action="{{ route('userProfile') }}" method="post"> 
                @csrf
                <input type="hidden" name="Id" value="{{ $Id }}">
                <input type="hidden" name="Username" value="{{ $Username }}">
                <input type="hidden" name="Password" value="{{ $Password }}">
                <input type="hidden" name="Email" value="{{ $Email }}">
                <button class="btn btn-primary usuario" type="submit">Mi perfil</button>
            </form><br>
            
        </div>
    </div>
</body>
</html>
