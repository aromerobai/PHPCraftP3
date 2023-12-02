<!-- crear_acto.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscribify | Editar-Evento</title>
    
    <!-- Incluir Bootstrap desde tu carpeta local -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Incluir tu archivo de estilos personalizado -->
    <link rel="stylesheet" href="{{ asset('css/crear_acto.css') }}">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-10">
                <div class="card">
                    <h1 class="text-register">Editar Evento</h1>
                    <div class="card-body lista-actos">
                        <?php
                            use App\Models\Acto;
                            $actos = Acto::all();
                        ?>  
                        @foreach($actos as $acto)
                        <div class="acto">
                            <span>ID: {{ $acto->Id_acto }}, Titulo: {{ $acto->Titulo }}</span>
                            <button class="btn btn-editar-acto" data-id="{{ $acto->Id_acto }}">Editar</button>
                            <form method="POST" action="{{ route('adminEditFullEvent') }}" class="formulario-editar-acto border p-3" style="display:none;">
                                <input type="hidden" name="id_acto" value="{{ $acto->Id_acto }}">
                                <div class="form-group">
                                    <label for="titulo">Título</label>
                                    <input type="text" name="titulo" id="titulo" class="form-control" required value="{{ $acto->Titulo }}">
                                </div>
                                <div class="form-group">
                                    <label for="descripcion_corta">Resumen</label>
                                    <input type="text" name="descripcion_corta" id="descripcion_corta" class="form-control" required value="{{ $acto->Descripcion_corta }}">
                                </div>
                                <div class="form-group">
                                    <label for="descripcion_larga">Descripción</label>
                                    <textarea name="descripcion_larga" id="descripcion_larga" class="form-control" rows="3" required>{{ $acto->Descripcion_larga }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="fecha">Fecha</label>
                                    <input type="date" name="fecha" id="fecha" class="form-control" required value="{{ $acto->Fecha }}">
                                </div>
                                <div class="form-group">
                                    <label for="hora">Hora</label>
                                    <input type="time" name="hora" id="hora" class="form-control" required value="{{ $acto->Hora }}">
                                </div>
                                <div class="form-group">
                                    <label for="id_tipo_acto">Tipo de Acto</label>
                                    <select name="id_tipo_acto" id="id_tipo_acto" class="form-control" required value="{{ $acto->Id_tipo_acto }}">
                                        <option value="1">Conferencia</option>
                                        <option value="2">Evento cinematográfico</option>
                                        <option value="3">Evento cultural</option>
                                        <option value="4">Evento deportivo</option>
                                        <option value="5">Evento gastronómico</option>
                                        <option value="6">Evento musical</option>
                                        <option value="7">Seminario</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="num_asistentes">Número de Asistentes</label>
                                    <input type="number" name="num_asistentes" id="num_asistentes" class="form-control" required value="{{ $acto->Num_asistentes }}">
                                </div>
                                <button type="submit" name="editarActo" class="btn btn-primary btn-block">Aplicar</button>
                            </form>
                        </div>
                    @endforeach
                    </div>
                    <a href="{{ route('adminBack') }}" class="btn btn-primary button-atras">Atras</a>
                </div>
            </div>
        </div>
    </div>

    <script> 
    const botonEditar = document.querySelectorAll('.btn-editar-acto');

    botonEditar.forEach(boton => {
        boton.addEventListener('click', () => {
            const formulario = boton.nextElementSibling; // Obtener el formulario asociado al botón

            // Cambiar la visibilidad del formulario
            if (formulario.style.display === 'none' || formulario.style.display === '') {
                formulario.style.display = 'block';
            } else {
                formulario.style.display = 'none';
            }
        });
    });
    </script> 
    
</body>
</html>