<!-- resources/views/home.blade.php -->

{{-- REVISAR--}}
@if (request()->has('mensaje'))
    <div class="alert alert-info">{{ urldecode(request()->get('mensaje')) }}</div>
@endif

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscribify | Inicio</title>
</head>

<body>
    <div class="home-container">
        <div class="row">
            <!-- Primera Columna - Nombre de la Aplicación -->
            <div class="col-7 text-center aplcation-column">
                <h1 class="name-aplication">Inscribify</h1>
            </div>

            <!-- Segunda Columna - Botones de Logearse y Registrarse -->
            <div class="col-5 text-center column-function">
                <h2 class="login-register">Accede a la aplicación</h2>
                
                
                @if (request()->has('action') && request()->get('action') == 'mostrarFormularioLogin')
                    {{-- Si se hace clic en "Log In", mostrar el formulario de inicio de sesión --}}
                    @include('tu_controlador.mostrarFormularioLogin') {{-- Aquí incluirías el contenido del formulario de inicio de sesión --}}
                @elseif (request()->has('action') && request()->get('action') == 'mostrarFormularioRegistro')
                    {{-- Si se hace clic en "Sing Up", mostrar el formulario de registro --}}
                    @include('tu_controlador.mostrarFormularioRegistro') {{-- Aquí incluirías el contenido del formulario de registro --}}
                @else
                    {{-- Mostrar los botones por defecto --}}
                    <a class="btn btn-login" href="{{ route('login.form') }}">Log In</a>
                    <a class="btn btn-register" href="{{ route('register.form') }}">Sign Up</a>
                @endif
                
            </div>
        </div>
    </div>
</body> 
</html>