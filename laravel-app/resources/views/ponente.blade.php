<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/ponente.css') }}">
</head>
<body>
    <div class="centered-content">
        <div class="content-box">
            <h1>Ponente {{$Username}}</h1>
            <br><br>
            <h1 class="text-register">Eventos en los que estas Inscrito</h1>
            @php
                use App\Models\Acto;
                $actos = Acto::all();
                use App\Models\Inscrito;
                $actosInscritos = Inscrito::where('Id_persona', $Id)->with('acto')->get();

            @endphp
            @foreach($actos as $acto)
            @php
                $estaInscrito = false;
                foreach($actosInscritos as $actoInscrito) {
                    if ($actoInscrito->id_acto == $acto->Id_acto) {
                        $estaInscrito = true;
                        break;
                    }
                }
            @endphp
            @if ($estaInscrito)
                <div class='inscripcion'>
                    <h3 class='mb-4'>{{ $acto->Titulo }}</h3>
                    <p>Fecha: {{date('Y-m-d', strtotime($acto->Fecha))}} | Hora: {{date('H:i', strtotime($acto->Hora))}} </p>
                    <p>{{ $acto->Descripcion_corta }}</p>
                </div>
            @endif
            @endforeach
            <br>
            @php
                use App\Models\ListaPonente;

                $actos = ListaPonente::where('Id_persona', $Id)
                            ->with(['acto' => function ($query) {
                                $query->with('lista_ponentes.persona');
                            }])
                            ->get()
                            ->pluck('acto');
                
                echo "<h1 class='text-register'>Eventos en los que eres Ponente</h1>";
                foreach ($actos as $acto) {    
                    echo " <div class='inscripcion'>";
                    echo " <h3 class='mb-4'> Acto: " . $acto->Titulo . "</h3>";
                    echo " <p>Fecha: " . date('Y-m-d', strtotime($acto->Fecha)) . "| Hora: " . date('H:i', strtotime($acto->Hora)) . "</p>";
                    echo " <p>$acto->Descripcion_corta </p>";
                    echo " </div>";
                }
            @endphp
            @php
                use Carbon\Carbon;
                $actos = ListaPonente::where('Id_persona', $Id)
                            ->with(['acto' => function ($query) {
                                $query->where('Fecha', '<', Carbon::now())
                                    ->with('lista_ponentes.persona');
                            }])
                            ->get()
                            ->pluck('acto');

                echo "<h1 class='text-register'>Eventos en los que has sido Ponente</h1>";
                foreach ($actos as $acto) {
                    // Asegúrate de que el acto no sea nulo antes de intentar acceder a sus propiedades
                    if ($acto) {
                        echo " <div class='inscripcion'>";
                        echo " <h3 class='mb-4'> Acto: " . $acto->Titulo . "</h3>";
                        echo " <p>Fecha: " . date('Y-m-d', strtotime($acto->Fecha)) . "| Hora: " . date('H:i', strtotime($acto->Hora)) . "</p>";
                        echo " <p>$acto->Descripcion_corta </p>";
                        echo '<form action="subirArchivo" method="POST" enctype="multipart/form-data">';
                        echo csrf_field(); // Generar el token CSRF para seguridad
                        echo '<input type="file" name="archivo" required>';
                        echo '<input type="hidden" name="Id" value="' . $Id . '">';
                        echo '<input type="hidden" name="Username" value="' . $Username . '">';
                        echo '<input type="hidden" name="id_acto" value="' . $acto->Id_acto . '">';
                        echo '<button type="submit">Subir Archivo</button>';
                        echo '</form>';
                        echo " </div>";
                    }
                }

            @endphp
        </div>
    </div>
</body>
</html>