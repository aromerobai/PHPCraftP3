<!-- registro.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscribify | Registro de Usuario</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Enlaza tu hoja de estilos -->
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-register">Registro</h1>

                        <!-- Formulario de registro -->
                        <form class="border p-3" action="{{ route('register') }}" method="post">
                            @csrf <!-- Agrega el token CSRF -->

                            <!-- Campos de la información de la persona -->
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" class="form-control" required>
                            </div>
                            <!-- Agrega el resto de los campos del formulario -->

                            <button type="submit" name="createPerson" class="btn btn-primary btn-block">Crear Usuario</button>
                        </form>

                        @if ($mensaje === 'Error en el registro!')
                            <p style="color:red; margin-top:15px">Error en el registro del usuario</p>
                        @else
                            <!-- Redirección a la página de inicio -->
                            <script>window.location = "{{ url('/') }}";</script>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>