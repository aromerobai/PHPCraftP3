<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Login</h2>
    @foreach ($usuarios as $usuario)
            <li>{{ $gitusuario->Username }}</li>
            <!-- Aquí puedes mostrar otros atributos del usuario -->
    @endforeach
</body>
</html>