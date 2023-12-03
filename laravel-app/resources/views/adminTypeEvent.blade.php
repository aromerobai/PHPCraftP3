<!-- tipo_evento.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscribify | Configurar-Tipo Evento</title>
    
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
                        <h1 class="text-register">Gestión Tipo de Evento</h1>
                        <div class="card-body lista-actos">
                            <?php 
                            use App\Models\tipoActo;
                            $resultados = tipoActo::all();
                            if ($resultados) {
                                foreach ($resultados as $tipoActo) {
                                    $Id_tipo_acto = $tipoActo['Id_tipo_acto'];
                                    $Descripcion = $tipoActo['Descripcion'];
                            ?>
                            <div class="tipoActo">
                                <span>ID: <?= $tipoActo['Id_tipo_acto'] ?>, nombre: <?= $tipoActo['Descripcion'] ?></span>
                                <button class="btn btn-editar-acto " data-id="<?= $tipoActo['Id_tipo_acto'] ?>">Editar</button>

                                <form method="POST" action="{{ route('adminTypeEventEdit') }}" class="formulario-editar-tipoActo border p-3" style="display:none;">
                                    <input type="hidden" name="Id_tipo_acto" value="<?= $Id_tipo_acto ?>">
                                    <div class="form-group">
                                        <label for="Descripcion">Descripcion del tipo de Acto</label>
                                        <input type="text" name="Descripcion" id="Descripcion" class="form-control" required value="<?= $Descripcion ?>">
                                    </div>
                                    <div class="button-container">
                                        <button type="submit" name="guardar_cambios" class="btn btn-primary">Aplicar</button>
                                        <button type="submit" name="eliminar_tipoActo" class="btn btn-danger eliminar">Eliminar</button>
                                    </div>
                                </form>

                            </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                        <button class="btn btn-primary" id="btnMostrarFormulario">Agregar</button>
                                
                            <!-- Formulario de registro Tipo Acto-->
                            <form class="border p-3" action="{{ route('adminTypeEventAdd') }}" method="post" id="formularioCrearTipoActo" style="display: none;">
                                <div class="form-group">
                                    <label for="Descripcion">Descripcion del tipo de Acto</label>
                                    <input type="text" name="Descripcion" class="form-control" required>
                                </div>      
                                <button type="submit" name="añadirTipoActo" class="btn btn-agregar">Crear Tipo Acto</button> 
                            </form>
                            <a href="{{ route('adminBack') }}" class="btn btn-primary button-atras">Atras</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const formulario = document.getElementById("formularioCrearTipoActo");
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