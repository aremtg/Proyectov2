<?php
require_once('../php/main.php');
require_once('../php/conexion.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permisos</title>
     <link rel="stylesheet" href="../css/mens_modales.css">
     <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/bulma.min.css">
    <link rel="stylesheet" href="../css/crear_permisos.css">
    <link rel="stylesheet" href="../css/aplicacionPermiso.css">
  

</head>
<body>
<div class="contenedor_contenido">
    <article class="panel-heading"> 
        <h3 class="">
        Permisos concedidos
        </h3>
        <p class="">
            Se esta reflejando los permisos que dados por cada instructor
        </p>     

    </article>
        <div class="">
            <?php
             $result = $db->query("SELECT 
             id,
             usuario,
             nombreUsuario,
             apellidoUsuario,
             hora_permiso,
             fecha_permiso,
             nombre_instructor_permiso,
             nombre_aprendiz_permiso,
             titulada_permiso,
             ficha_permiso,
             ambiente_permiso,
             motivo_permiso, 
             creado FROM permisosdata");
                if ($result->num_rows > 0) {
                    $permisosPorFecha = array();

                    while ($fila = $result->fetch_assoc()) {
                        $fecha = $fila['fecha_permiso'];

                        // Agrupar permisos por fecha
                        if (!isset($permisosPorFecha[$fecha])) {
                            $permisosPorFecha[$fecha] = array();
                        }

                        $permisosPorFecha[$fecha][] = $fila;
                    }

                foreach ($permisosPorFecha as $fecha => $permisos) {
            ?>
            
                <div class="is-flex permisos_por_fecha ">
                    <div class="fecha_permisos py-2">
                        <h2 class=""> Del:
                            <?php echo $fecha ;?>
                        </h2>
                    </div>
                <?php
                    foreach ($permisos as $permiso) {
                       
                        // Tu código para mostrar cada permiso en el div
                        $permisoId = $permiso['id'];
                        $usuario = $permiso['usuario'];
                        $nombreUsuario = $permiso['nombreUsuario'];
                        $apellidoUsuario = $permiso['apellidoUsuario'];
                        $hora = $permiso['hora_permiso'];
                        $fecha = $permiso['fecha_permiso'];
                        $nombreInstructor = $permiso['nombre_instructor_permiso'];
                        $nombreAprendiz = $permiso['nombre_aprendiz_permiso'];
                        $titulada = $permiso['titulada_permiso'];
                        $ficha = $permiso['ficha_permiso'];
                        $ambiente = $permiso['ambiente_permiso'];
                        $motivo =$permiso['motivo_permiso'];
                        $fechaCreado = $permiso['creado'];
                        
                        echo '<div class="hoja px-2 py-3" id="hoja">
                                <div class="fecha-hora px-2">
                                    <div class="is-flex ">
                                    <img src="../images/iconos/reloj-icon.svg" class="icon-small mr-1" alt="">
                                        <input type="time" class="hora" name="hora_permiso" value="'. $hora . '" readonly />
                                    </div>          
                                    <div class="fecha">
                                    '. $fecha . '
                                    </div>
                                </div>

                                <label class="label">Instructor:</label>
                                <input type="text" value="' . $nombreInstructor . '" readonly name="nombre_instructor_permiso"><br>
                                
                                <label class="label">Aprendiz:</label>
                                    <input type="text" id="titulada" name="titulada_permiso" require readonly value="'. $nombreAprendiz . '" />

                                <div>
                                    <label class="label">Titulada:</label>
                                    <input type="text" id="titulada" name="titulada_permiso" require readonly value="' . $titulada . '" />
                                </div>
                                <div class="div-ficha-ambiente">
                                    <div>
                                        <label class="label">Ficha:</label>
                                        <input type="text" min="5" max="11" id="ficha" name="ficha_permiso" require readonly value="' . $ficha . '" />
                                    </div>
                                    <div>
                                        <label class="label">Ambiente:</label>
                                        <input type="text" id="ambiente" name="ambiente_permiso" require readonly value="' . $ambiente . '" />
                                    </div>
                                </div>
                                <label class="label">Motivo de la salida:</label>
                                <textarea id="motivo" rows="3" cols="8" placeholder="" maxlength="40" name="motivo_permiso" disabled style="resize: none;">' . $motivo . '</textarea>

                                <div class="my-center-gap p-3">
                                    <div class="py-3">
                                        <button id="botonEnviar" type="submit" class="my-button button-clr-azul js-modal-trigger" data-target="modal_' . $permisoId. '">
                                        <img src="../images/iconos/info-icon-b.svg" class="icon" alt="">
                                        Detalles
                                        </button>
                                    </div>
                                    <div class="py-3">
                                        <button id="botonEnviar" type="submit" class="my-button button-clr-naranja js-modal-trigger" data-target="modal_archivar' . $permisoId. '">
                                        <img src="../images/iconos/archivar-icon-b.svg" class="icon" alt="">
                                        Archivar
                                        </button>
                                    </div>
                                </div>
                            </div>
                
                            <!-- SECCION PARA VER DETALLES DEL PERMISO -->
                            <div class="modal" id="modal_' . $permisoId. '"> <!-- Utiliza un identificador único para cada modal -->
                                <div class="modal-background"></div>
                                <div class="modal-card">
                                    <header class="modal-card-head azul">
                                        <h3 class="modal-card-title texto-blanco my-center-gap">
                                        <img src="../images/iconos/info-icon-b.svg" class="icon" alt="">Detalles del permiso</h3>
                                        <button class="delete" aria-label="close"></button>
                                    </header>
                                    <section class="modal-card-body">
                                        <!-- Contenido del modal -->
                                        <div class="is-flex is-flex-direction-column">
                                            <label for="buscar_titulada" class="label mr-4">Fecha y hora de envio del permiso:</label>
                                            <div class="">' . $fechaCreado . '</div>
                                            <label for="buscar_titulada" class="label mr-4">Quien solicito el permiso:</label>
                                            <div class="">' . $usuario . '</div>
                                            <label for="buscar_titulada" class="label mr-4">nombre completo:</label>
                                            <div class="">' . $nombreUsuario ." ". $apellidoUsuario .'</div>
                                            
                                        </div>
                                        <div id="resultado-busqueda" class="mb-3"></div> 
                                    </section>
                                </div>
                            </div>
                            <!-- FIN SECCION DEL MODAL -->
                            <!-- SECCION PARA ELIMINAR EL PERMISO -->
                            <div class="modal" id="modal_archivar' . $permisoId. '"> <!-- Utiliza un identificador único para cada modal -->
                                <div class="modal-background"></div>
                                <div class="modal-card">
                                    <header class="modal-card-head naranja">
                                        <h3 class="modal-card-title texto-blanco my-center-gap" >
                                        <img src="../images/iconos/archivar-icon-b.svg" class="icon" alt="">Archivar</h3>
                                        <button class="delete" aria-label="close"></button>
                                    </header>
                                    <section class="modal-card-body">
                                        <!-- Contenido del modal -->
                                        <div class="is-flex is-flex-direction-column">
                                            <label for="buscar_titulada" class="label mr-4">¿DESEA MOVER ESTE PERMISO A LA PAPELERA?</label>
                                            <div class="">' . $fechaCreado . '</div>
                                            <button id="botonEnviar" type="submit" class="my-button button-clr-verde js-modal-trigger">SI</button>

                                        </div>
                                        <div id="resultado-busqueda" class="mb-3"></div> 
                                    </section>
                                </div>
                            </div>
                            <!-- FIN SECCION DEL MODAL -->';
                            
                    }
                ?>
              
            </div>
        <?php
            }
        } else {
            echo '<div class="my-center-gap has-text-primary">
                    <h1>No se encontro permisos en la base de datos.</h1>
                </div>';
        }
        $db->close();
        ?>
   <script src="../js/modal.js"></script>
</div>

</body>
</html>
