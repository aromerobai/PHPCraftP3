<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscribify | Inscripciones</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/registro.css') }}">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-register">DesInscripciones</h1>
                        @php
                            use App\Models\Acto;
                            $actos = Acto::all();

                            use App\Models\Inscrito;
                            $actosInscritos = Inscrito::where('Id_persona', $Id)->with('acto')->get();

                        @endphp

                        @foreach($actos as $acto)
                        @php
                            $estaInscrito = false;
                            $fechaActual = date('Y-m-d');
                            $fechaEvento = date('Y-m-d', strtotime($acto->Fecha));

                            if ($fechaEvento < $fechaActual) {
                                continue; 
                            }

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
                                <p>Fecha: {{ date('Y-m-d', strtotime($acto->Fecha)) }} | Hora: {{ date('H:i', strtotime($acto->Hora)) }}</p>
                                <p>{{ $acto->Descripcion_corta }}</p>

                                @isset($Ponente)
                                    <form action="{{ route('userDesAddInscription') }}" method="post">
                                        <input type='hidden' name='id_acto' value='{{ $acto->Id_acto }}'> 
                                        <input type='hidden' name='id_persona' value='{{ $Id }}'>
                                        <input type='hidden' name='password' value='{{ $Password }}'>
                                        <input type='hidden' name='email' value='{{ $Email }}'>
                                        <input type='hidden' name='username' value='{{ $Username }}'>
                                        <input type="hidden" name="Ponente" value="{{ $Ponente }}">
                                        <button type='submit' name='inscribirse' class='btn btn-primary btn-inscripcion'>DesInscribirse</button>
                                    </form>
                                @else
                                    <form action="{{ route('userDesAddInscription') }}" method="post">
                                        <input type='hidden' name='id_acto' value='{{ $acto->Id_acto }}'> 
                                        <input type='hidden' name='id_persona' value='{{ $Id }}'>
                                        <input type='hidden' name='password' value='{{ $Password }}'>
                                        <input type='hidden' name='email' value='{{ $Email }}'>
                                        <input type='hidden' name='username' value='{{ $Username }}'>
                                        <button type='submit' name='inscribirse' class='btn btn-primary btn-inscripcion'>DesInscribirse</button>
                                    </form>
                                @endif
                            </div>
                        @endif
                        @endforeach
                        <br>
                    </div>
                    @isset($Ponente)
                    <form action="{{ route('userAddInscriptionBack') }}" method="post">
                        <input type='hidden' name='id_acto' value='{{ $acto->Id_acto }}'> 
                        <input type='hidden' name='id_persona' value='{{ $Id }}'>
                        <input type='hidden' name='password' value='{{ $Password }}'>
                        <input type='hidden' name='email' value='{{ $Email }}'>
                        <input type='hidden' name='username' value='{{ $Username }}'>
                        <input type="hidden" name="Ponente" value="{{ $Ponente }}">
                        <button type='submit' name='inscribirse' class='btn btn-primary btn-inscripcion'>Volver</button>
                    </form>
                    @else
                        <form action="{{ route('userAddInscriptionBack') }}" method="post">
                            <input type='hidden' name='id_acto' value='{{ $acto->Id_acto }}'> 
                            <input type='hidden' name='id_persona' value='{{ $Id }}'>
                            <input type='hidden' name='password' value='{{ $Password }}'>
                            <input type='hidden' name='email' value='{{ $Email }}'>
                            <input type='hidden' name='username' value='{{ $Username }}'>
                            <button type='submit' name='inscribirse' class='btn btn-primary btn-inscripcion'>Volver</button>
                        </form>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</body>
</html> 