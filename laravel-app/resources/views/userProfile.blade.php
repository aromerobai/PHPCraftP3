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
                        <form action="{{ route('userProfileModify') }}" method="post"> 
                            @csrf
                            <input type="hidden" name="Id" value="{{ $Id }}">
                            <div class="form-group"> 
                                <label for="Username">Usuario:</label>
                                <input type="text" id="Username" name="Username" class="form-control" placeholder="{{ $Username }}">
                            </div>
                            <div class="form-group">
                                <label for="Password">Contraseña:</label>
                                <input type="password" id="Password" name="Password" class="form-control" placeholder="{{ $Password }}">
                            </div>
                            <div class="form-group">
                                <label for="Email">Email:</label>
                                <input id="Email" name="Email" class="form-control" placeholder="{{ $Email }}">
                            </div>
                            <div class="d-flex justify-content-between align-items-center flex-nowrap mt-3">
                                <button type="submit" class="btn btn-block btn-primary align-self-start mr-2">Modificar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

    