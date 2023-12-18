<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscribify | Eventos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/actos.css') }}">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-7">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-register">Lista de Actos</h1>
                        @php
                            use App\Models\Acto;
                            $actos = Acto::all();
                            $usuarioAutenticado = Auth::user(); // Obtener el usuario autenticado
                        @endphp

                        @foreach($actos as $acto)
                            <div class='inscripcion'>
                                <h3 class='mb-4'>{{ $acto->Titulo }}</h3>
                                <p>Fecha: {{ date('Y-m-d', strtotime($acto->Fecha)) }} | Hora: {{ date('H:i', strtotime($acto->Hora)) }}</p>
                                <p>{{ $acto->Descripcion_corta }}</p>
                                <p>{{ $acto->Descripcion_larga }}</p>
                                <p> Aforo máximo: {{ $acto->Num_asistentes }}</p>
                                
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-5 text-center column-function fixed-column">
                <h2 class="login-register">Accede a la aplicación</h2>
                
                
                @if (request()->has('action') && request()->get('action') == 'mostrarFormularioLogin')
                    {{-- Si se hace clic en "Log In", mostrar el formulario de inicio de sesión --}}
                    @include('home.mostrarFormularioLogin') 
                @elseif (request()->has('action') && request()->get('action') == 'mostrarFormularioRegistro')
                    {{-- Si se hace clic en "Sing Up", mostrar el formulario de registro --}}
                    @include('home.mostrarFormularioRegistro') 
                @else
                    {{-- Mostrar los botones por defecto --}}
                    <a class="btn btn-login" href="{{ route('login') }}">Log In</a>
                    <a class="btn btn-register" href="{{ route('register') }}">Sign Up</a>    
                @endif

            </div>
            
        </div>
    </div>
</body>
</html>




