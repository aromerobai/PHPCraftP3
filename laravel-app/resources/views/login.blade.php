<!-- login.blade.php -->

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-login">Log In</h1>

                        @if (isset($mensaje))
                            <p class="alert alert-info">{{ $mensaje }}</p>
                        @endif

                        <!-- Formulario de inicio de sesión -->
                        <form action="{{ route('login') }}" method="post">
                            @csrf <!-- Agrega el token CSRF para seguridad -->

                            <!-- Campo de usuario -->
                            <div class="form-group">
                                <label for="usuario">Usuario:</label>
                                <input type="text" id="usuario" name="usuario" class="form-control" required>
                            </div>

                            <!-- Campo de contraseña -->
                            <div class="form-group">
                                <label for="contrasena">Contraseña:</label>
                                <input type="password" id="contrasena" name="contrasena" class="form-control" required>
                            </div>

                            <!-- Botón de envío del formulario -->
                            <button type="submit" name="loginUsuario" class="btn btn-primary btn-block">Iniciar sesión</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection