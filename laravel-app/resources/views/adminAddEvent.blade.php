<!-- crear_acto.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscribify | Añadir-Evento</title>
    
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
                    <div class="card-body">
                        <h1 class="text-register">Añadir Evento</h1>
                        <!-- Formulario de registro -->
                        <form class="border p-3" action="{{ route('adminAddEventInsert') }}" method="post">
                            <div class="form-group">
                                <label for="titulo">Título</label>
                                <input type="text" name="titulo" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion_corta">Resumen</label>
                                <input type="text" name="descripcion_corta" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion_larga">Descripción</label>
                                <textarea name="descripcion_larga" class="form-control" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="fecha">Fecha</label>
                                <input type="date" name="fecha" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="hora">Hora</label>
                                <input type="time" name="hora" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="id_tipo_acto">Tipo de Acto</label>
                                <select name="id_tipo_acto" class="form-control" required> 
                                    <?php
                                    use App\Models\tipoActo;
                                    $resultado = tipoActo::all();
                                    if ($resultado) {
                                        foreach ($resultado as $tipoActo) {
                                            $Id_tipo_acto = $tipoActo['Id_tipo_acto'];
                                            $Descripcion = $tipoActo['Descripcion'];
                                            echo '<option value="' . $Id_tipo_acto . '">' . $Descripcion . '</option>'; 
                                        }
                                    } else {
                                        echo "No hay tipos de actos disponibles.";
                                    }   
                                    ?> 
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="num_asistentes">Número de Asistentes</label>
                                <input type="number" name="num_asistentes" class="form-control" required>
                            </div>
                            <button type="submit" name="crearActo" class="btn btn-primary btn-block">Crear Evento</button>
                                                
                            @if(isset($mensaje))
                                @if($mensaje === 'Error al crear el evento')
                                    <p style='color:red; margin-top:15px'>Error al registrar el evento</p>
                                @else
                                    <p style='color:green; margin-top:15px'>Se ha registrado el evento</p>
                                @endif
                            @endif
                            
                        </form>
                        <a href="{{ route('adminBack') }}" class="btn btn-primary button-cerrar">Atras</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>