<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Configuración del documento -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>     
    <div class="container"> 
        <div class="row"> 
            <div class="col-4">
                <div class="card"> 
                    <div class="card-body">
                        <h1 class="text-login">Modificar</h1>
                        <form action="./perfilUsuarioVista.php" method="post">
                            @csrf
                            <input type="hidden" name="id_usuario" value="{{ $id }}">
                            <div class="form-group">
                                <label for="usuario">Usuario:</label>
                                <input type="text" id="usuario" name="usuario" class="form-control" placeholder="{{ $username }}">
                            </div>
                            <div class="form-group">
                                <label for="contrasena">Contraseña:</label>
                                <input type="password" id="contrasena" name="contrasena" class="form-control" placeholder="{{ $password }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input id="email" name="email" class="form-control" placeholder="{{ $email }}">
                            </div>
                            <div class="d-flex justify-content-between align-items-center flex-nowrap mt-3">
                                <button type="submit" name="updateUsuario" class="btn btn-block btn-primary align-self-start mr-2">Modificar</button>
                                <button onclick="" class="btn btn-block btn-secondary align-self-end">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
    