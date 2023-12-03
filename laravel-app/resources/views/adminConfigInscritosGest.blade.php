<?php

use App\Models\Inscrito;
use App\Models\Persona;


if(isset($_GET['id_acto'])) {
    $id_acto = $_GET['id_acto'];
    $titulo = $_GET['titulo'];
} else {
    echo "No se proporcionó ningún ID.";
}

if(isset($_GET['id_persona_seleccionada'])){
    $id_acto_desinscribir = $_GET['id_acto'];
    $id_persona = $_GET['id_persona_seleccionada'];
    $inscripcion = Inscrito::where('id_acto', $id_acto_desinscribir)
    ->where('Id_persona', $id_persona)
    ->first();
    if ($inscripcion) {
        $inscripcion->delete();
    }
}

if(isset($_GET['id_persona_inscribir'])){
    $id_acto_inscribir = $_GET['id_acto'];
    $id_persona = $_GET['id_persona_inscribir'];

    // Obtener la fecha y hora actual
    $fecha_actual = Carbon::now();

    // Crear un nuevo registro de inscripción utilizando Eloquent
    $nueva_inscripcion = new Inscrito();
    $nueva_inscripcion->Id_persona = $id_persona;
    $nueva_inscripcion->id_acto = $id_acto_inscribir;
    $nueva_inscripcion->Fecha_inscripcion = $fecha_actual;
    $nueva_inscripcion->save();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscribify | Lista-inscritos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/usuarioVista.css') }}">
</head>
<body>
    <div class="container">
            <div class="jumbotron mt-3 text-center">
                <h1 class="display-4 mb-5">Evento: <?php echo $titulo; ?></h1>
            
                <button class="btn btn-primary mr-2" onclick="window.location.href='{{ route('configInscribir', ['view' => 'inscribir', 'id_acto' => $id_acto, 'titulo' => $titulo,]) }}'">Inscribir</button>
                <button class="btn btn-primary mr-2" onclick="window.location.href='{{ route('configDesInscribir', ['view' => 'desinscribir', 'id_acto' => $id_acto, 'titulo' => $titulo,]) }}'">Desincribir</button>
            </div>
        
        <div class="view">
                <!-- Contenido que se mostrará aquí según se haga clic en los botones -->
        
        <?php

        if(isset($_GET['view'])) {
            $view = $_GET['view'];
            /* ******************************************************************************************************************************/
            if ($view === 'desinscribir') {
                echo "<div class='container-inscritos'>";
                echo "<h3 class='mb-5'> Inscritos en el Acto: </h3>";
                $inscritos = Inscrito::where('id_acto', $id_acto)->get();
                if ($inscritos) {
                    foreach ($inscritos as $inscrito) {
                        $id_persona = $inscrito['Id_persona'];
                        $persona = Persona::find($id_persona);
                        if($persona){
                            $id_persona_seleccionada = $persona['Id_persona'];
                            $nombre = $persona['Nombre'];
                            $apellido1 = $persona['Apellido1'];
                            $apellido2 = $persona['Apellido2'];
                            ?>
                            <div class='container-inscrito'>
                                <p> Nombre: {{$nombre}}  {{$apellido1}} {{$apellido2}} </p>
                                <form method='get' action='{{ route('adminDesincribir') }}'>
                                    <input type="hidden" name="id_acto" value="{{$id_acto}}">
                                    <input type="hidden" name="titulo" value="{{$titulo}}">
                                    <input type="hidden" name="id_persona_seleccionada" value="{{$id_persona_seleccionada}}">
                                    <input type="hidden" name="view" value="desinscribir">
                                    <button class="btn btn-primary inscribirse" type="submit" name="desinscribirse" value="desinscribirse">DesInscribir</button>
                                </form>
                                <br>
                            </div>
                            <?php
                        }
                    }
                }
            }
            /* ******************************************************************************************************************************/
            if ($view === 'inscribir') {
                $personas = Persona::all();
                echo "<div class='container-inscritos'>";
                echo "<h3 class='mb-5'> No Inscritos en el Acto: </h3>";
                foreach($personas as $persona){
                    $id_persona_inscribir = $persona['Id_persona'];
                    $nombre = $persona['Nombre'];
                    $apellido1 = $persona['Apellido1'];
                    $apellido2 = $persona['Apellido2'];
                    $inscripcion = Inscrito::where('Id_persona', $id_persona_inscribir)
                        ->where('id_acto', $id_acto)
                        ->first();

                    if ($inscripcion === null) {
                        ?>
                        <div class='container-inscrito'>
                        <p>Nombre: {{$nombre}}  {{$apellido1}}  {{$apellido2}}</p>
                        <form method='get' action='{{ route('adminIncribir') }}'>
                            <input type="hidden" name="id_acto" value="{{$id_acto}}">
                            <input type="hidden" name="titulo" value="{{$titulo}}">
                            <input type="hidden" name="id_persona_inscribir" value="{{$id_persona_inscribir}}">
                            <input type="hidden" name="view" value="inscribir">
                            <button class="btn btn-primary inscribirse" type="submit" name="inscribirse" value="inscribirse">Inscribir</button>
                        </form>
                        <br>
                        </div>
                        <?php
                    }
                }
            }
        }
        echo "</div>";
        ?>
        <a href="{{ route('configInscritos') }}" class="btn btn-primary button-atras">Atras</a>
        </div>
    </div>
</body>
</html>