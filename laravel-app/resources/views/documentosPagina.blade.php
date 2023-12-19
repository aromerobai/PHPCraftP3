<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/ponente.css') }}">
    <title>Document</title>
</head>
<body>
    <body>
        <div class="centered-content">
            <div class="content-box">
                <h1 class="text-register">Documentos</h1>
                @php
                    use App\Models\Documentacion;
                    use App\Models\Acto;
                    use App\Models\Persona;

                    $documentos = Documentacion::all();
                    foreach($documentos as $documento) {
                        $actoConFichero = Acto::find($documento->Id_acto);
                        $persona = Persona::find($documento->Id_persona);

                        echo " <div class='inscripcion'>";
                        echo " <h3 class='mb-4'>" . $actoConFichero->Titulo . " </h3>";
                        echo " " . $actoConFichero->Descripcion_corta . " <br>";
                        echo " " . $persona->Nombre . " ". $persona->Apellido1 . " <br>";
                        echo " " . $documento->Titulo_documento . " <br><br>";
                        echo '<a href="' . asset($documento->Localizacion_documentacion) . '" class="btn-link" download>Descargar</a><br>';
                        echo " </div>";
                    }
                @endphp
            </div>
        </div>                    
</body>
</html>