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
            <h1 class="text-register">Estas Inscrito</h1>
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
                    <p>Fecha: {{ $acto->Fecha }} | Hora:{{ $acto->Hora }}</p>
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
                
                echo "<h1 class='text-register'>Eres Ponente</h1>";
                foreach ($actos as $acto) {    
                    echo " <div class='inscripcion'>";
                    echo " <h3 class='mb-4'> Acto: " . $acto->Titulo . "</h3>";
                    echo " <p>Fecha:$acto->Fecha | Hora: $acto->Hora</p>";
                    echo " <p>$acto->Descripcion_corta </p>";
                    echo " </div>";
                }
            @endphp
        </div>
    </div>
</body>
</html>