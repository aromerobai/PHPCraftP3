<!-- ponente.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscribify | Configurar-Ponente</title>
    
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
                        <h1 class="text-register">Gestión Ponente</h1>
                        <div class="card-body lista-actos">
                            <?php
                            use App\Models\ListaPonente;
                            use App\Models\Usuario;
                            use App\Models\Acto;
                            use App\Models\Persona;

                            $resultado = ListaPonente::all();
                            ?>
                            @forEach ($resultado as $ponente)
                                <?php
                                    $Id_ponente = $ponente['id_ponente'];
                                    $Id_acto = $ponente['Id_acto'];
                                    $Id_persona = $ponente['Id_persona'];
                                    $Orden = $ponente['Orden'];
                                ?>
                                <div class="ponente">
                                    <!-- Linea que se muestra -->
                                    @php
                                    $persona = Persona::with('lista_ponentes')
                                                ->where('Id_persona', $Id_persona)
                                                ->first();
                                    @endphp
                                    @if ($persona)      
                                        <span><b> Nombre Ponente: </b>{{ $persona->Nombre }} {{ $persona->Apellido1}}, <b> Evento:</b> {{ $ponente['Id_acto'] }}, Orden: {{ $ponente['Orden'] }}</span>
                                    @endif
                                    <!-- Fin linea que se muestra -->
                                    <button class="btn btn-editar-acto" data-id="{{ $ponente['id_ponente'] }}">Editar</button>
                                    
                                    <form method="POST" action="{{ route('adminGestionarPonente') }}" class="formulario-editar-ponente border p-3" style="display:none;">
                                        <input type="hidden" name="id_ponente" value="{{ $Id_ponente }}">
                                        <div class="form-group">
                                            <label for="id_persona">ID personal</label>
                                            <select name="id_persona" class="form-control" required>
                                                @php  
                                                $usuarios = Usuario::all();
                                                if ($usuarios){
                                                    foreach($usuarios as $usuario) {
                                                        $Id_persona = $usuario['Id_Persona'];
                                                        $Id_tipo_usuario = $usuario['Id_tipo_usuario'];
                                                        $Username = $usuario['Username'];
                                                        if ($Id_tipo_usuario == 2) {
                                                            echo '<option value="' . $Id_persona. '">' . $Id_persona . ' ' . $Username . '</option>'; 
                                                        }
                                                    }
                                                }
                                                @endphp
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_acto">ID evento</label>
                                            <select name="id_acto" class="form-control" required>
                                                @php
                                                $actos = Acto::all();
                                                if ($actos){
                                                    foreach($actos as $acto) {
                                                        $Id_acto = $acto['Id_acto'];
                                                        $Titulo = $acto['Titulo'];
                                                        echo '<option value="' . $Id_acto. '">' . $Titulo . '</option>'; 
                                                    }
                                                }                    
                                                @endphp
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="Orden">Orden de aparición</label>
                                            <input type="number" name="orden" id="orden" class="form-control" required value="{{ $Orden }}">
                                        </div>
                                        <div class="button-container">
                                            <button type="submit" name="guardar_cambios" class="btn btn-primary">Aplicar</button>
                                            <button type="submit" name="eliminar_ponente" class="btn btn-danger eliminar">Eliminar</button>
                                        </div>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                        <button class="btn btn-primary" id="btnMostrarFormulario">Agregar</button>
                                
                            <!-- Formulario de registro Ponente-->
                            <form class="border p-3" action="{{ route('adminCrearPonente') }}" method="post" id="formularioCrearPonente" style="display: none;">
                                <div class="form-group">
                                    <label for="id_persona">ID personal</label>
                                    <select name="id_persona" class="form-control" required>
                                        @php  
                                        $resultados = Usuario::all();
                                        if ($resultados){
                                            foreach($resultados as $usuario) {
                                                $Id_persona = $usuario['Id_Persona'];
                                                $Id_tipo_usuario = $usuario['Id_tipo_usuario'];
                                                $Username = $usuario['Username'];
                                                if ($Id_tipo_usuario == 2) {
                                                    echo '<option value="' . $Id_persona. '">' . $Id_persona . ' ' . $Username . '</option>'; 
                                                }
                                            }
                                        }
                                        @endphp
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="id_acto">ID evento</label>
                                    <select name="id_acto" class="form-control" required>
                                        @php
                                        $resultados = Acto::all();
                                        if ($resultados){
                                            foreach($resultados as $acto) {
                                                $Id_acto = $acto['Id_acto'];
                                                $Titulo = $acto['Titulo'];
                                                echo '<option value="' . $Id_acto. '">' . $Titulo . '</option>'; 
                                            }
                                        }                    
                                        @endphp 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="orden">Orden de aparición</label>
                                    <input type="number" name="orden" class="form-control" required>
                                </div>      
                                <button type="submit" name="añadirPonente" class="btn btn-agregar">Crear Ponente</button> 
                            </form>
                        <a href="{{ route('adminBack') }}" class="btn btn-primary button-atras">Atras</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const formulario = document.getElementById("formularioCrearPonente");
        const btnMostrarFormulario = document.getElementById("btnMostrarFormulario");
        const btnCancelar = document.getElementById("btnCancelar");

        btnMostrarFormulario.addEventListener("click", function() {
            if (formulario.style.display === "none" || formulario.style.display === "") {
                formulario.style.display = "block";
                btnMostrarFormulario.textContent = "Cancelar";
            } else {
                formulario.style.display = "none";
                btnMostrarFormulario.textContent = "Agregar";
            }
        });

        btnCancelar.addEventListener("click", function() {
            formulario.style.display = "none";
            btnMostrarFormulario.textContent = "Agregar PONENTE";
        });
    </script>
    <script>
            // Obtiene todos los botones de "Editar" por su clase
        const botonesEditar = document.querySelectorAll(".btn-editar-acto");

        // Itera sobre cada botón y agrega un evento al hacer clic
        botonesEditar.forEach(boton => {
            boton.addEventListener("click", () =>{
                // Encuentra el formulario correspondiente basado en el botón clicado
                const formularioEditar = boton.nextElementSibling;
                
                // Muestra u oculta el formulario alternando su estado
                if (formularioEditar.style.display === "none" || formulario.style.display === "") {
                    formularioEditar.style.display = "block";
                } else {
                    formularioEditar.style.display = "none";
                }
            });
        });
    </script>
</body>
</html>