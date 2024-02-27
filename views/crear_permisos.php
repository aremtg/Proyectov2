<?php 
date_default_timezone_set("America/Bogota");
setlocale(LC_TIME, 'ES');
$mes = date('n'); // Obtener el número del mes (sin ceros a la izquierda)

$nombre_mes = strftime('%B', mktime(0, 0, 0, $mes, 1, date('Y')));
$nombre_mes = utf8_encode(ucfirst($nombre_mes));

$instructorSeleccionado = null;
// Verificar si el formulario se ha enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // si esta definida limpiar la acadena si no, sera null
    $instructorSeleccionado = isset($_POST['instructor']) ? limpiar_cadena($_POST['instructor']) : null;
}
?>
    <article class="panel-heading"> 
        <h3 class="">
            PERMISOS
        </h3>
        <p class="">
            Aqui podras generar un papel de permiso para salida de Aprendices.
        </p>     
    </article>
    <?php if (isset($_SESSION['guardar'])) : ?>

    <div class='message is-success'>
        <?= $_SESSION['guardar']; ?>
    </div>

    <?php elseif (isset($_SESSION['envioDatos'])) : ?>
    <div class='message is-danger '>
        <?= $_SESSION['envioDatos']; ?>
    </div>

    <?php elseif (isset($_SESSION['envioPermiso'])) : ?>
    <div class='message is-danger '>
        <?= $_SESSION['envioPermiso']; ?>
    </div>
    <?php endif; ?>

    <div class="mb-3">
    <?= isset($_SESSION['errores']) ? mostrarAlerta($_SESSION['errores'], 'envioPermiso') : ""; ?>
    <?= isset($_SESSION['errores']) ? mostrarAlerta($_SESSION['errores'], 'envioDatos') : ""; ?>
    </div>

    <div class="my-center-gap is-flex-wrap-wrap">
       <div class="cont_generador">
        <form action="" method="post">
            <label for="instructor" class="label is-flex is-justify-content-center" >Lista de instructores:</label>
            <div class='my-center-gap'>
                <select name="instructor" class='my-select' required id="instructor">
                    <option value="" disabled selected>Selecciona un instructor</option>
                        <?php
                            // Obtener la lista de instructores
                            $sqlInstructores = "SELECT DISTINCT id_instructor, nombre FROM instructores";
                            $resultadoInstructores = $db->query($sqlInstructores);

                            while ($filaInstructores = $resultadoInstructores->fetch_assoc()) {
                                $idInstructor = $filaInstructores['id_instructor'];
                                $nombreInstructor = $filaInstructores['nombre'];
                                // se marca la opción seleccionada si coincide con el valor en $instructorSeleccionado
                                $selected = ($instructorSeleccionado == $idInstructor) ? 'selected' : '';
                                echo '
                                <option value="' . $idInstructor . '" ' . $selected . '>' . $nombreInstructor . '</option>';
                            }
                        ?>
                        
                </select>
                <div class="my-center-gap">   
                    <button type="submit" name="submit" class='button-icon'>
                        <img src="images/iconos/flecha.svg"  class='icon' alt="">
                    </button>
                </div>
            </div>
        </form>
        <?php
            // Obtener el id_instructor seleccionado del formulario
            $instructorSeleccionado = isset($_POST['instructor']) ? limpiar_cadena($_POST['instructor']) : null;
            //var para almacenar los nombres de aprendices relacionados
            $nombresAprendices = array();
            // Verificar si se ha seleccionado un instructor
            if (!is_null($instructorSeleccionado)) {
                // Consulta SQL para obtener los nombres de aprendices relacionados con el id_instructor
                $sqlAprendices = "SELECT nombre_aprendiz FROM relacion_instructor_aprendiz WHERE id_instructor = $instructorSeleccionado";
                $resultadoAprendices = mysqli_query($db, $sqlAprendices);

                // Verificar si hay resultados
                if ($resultadoAprendices->num_rows > 0) {
                    while ($filaAprendices = $resultadoAprendices->fetch_assoc()) {
                        $nombresAprendices[] = $filaAprendices['nombre_aprendiz'];
                    }
                }
            }
        ?>
        <form method="POST" action="./php/cargar_permiso.php" class="hoja" id='hoja'>
                    <input type="hidden" name="usuario" value="<?= $_SESSION['usuario']['usuario_usuario']?>">
                    <input type="hidden" name="nombreUsuario" value="<?= $_SESSION['usuario']['nombre_usuario']?>">
                    <input type="hidden" name="apellidoUsuario" value="<?= $_SESSION['usuario']['apellido_usuario']?>">
                <div class="fecha-hora px-2">
                    <div class="is-flex ">
                        <img src="./images/iconos/reloj-icon.svg" class="icon-small mr-1" alt="">
                        <input type="time" class="hora" name="hora_permiso" readonly  />
                    </div>          
                    <div class="fecha">
                        <?php echo date('Y/') . ($nombre_mes) . date('/d'); ?>
                        <input type="hidden" name="fecha_permiso" value="<?php echo date('Y/m/d'); ?>" />
                    </div>
                </div>
                <?php
                    $nombreInstructor = '';

                    if (!empty($instructorSeleccionado)) {
                        $sqlNombreInstructor = "SELECT nombre FROM instructores WHERE id_instructor = $instructorSeleccionado";
                        $resultadoNombreInstructor = mysqli_query($db, $sqlNombreInstructor);

                        if ($resultadoNombreInstructor && $filaNombreInstructor = $resultadoNombreInstructor->fetch_assoc()) {
                            $nombreInstructor = $filaNombreInstructor['nombre'];

                            if (!empty($nombreInstructor)) {
                                echo '
                                <label for="nombreInstructorPermiso" class="label" >Instructor:</label>
                                <input type="text"  id="nombreInstructorPermiso" value="' . $nombreInstructor . '" readonly name="nombre_instructor_permiso"><br>';
                            } else {
                                echo '
                                <br>
                                <div class="modal-advertencia has-text-centered ">
                                    <strong class="has-text-danger ">Este instructor no existe!</strong>
                                </div>';
                            }
                        } else {
                            echo '
                            <br>
                            <div class="modal-advertencia has-text-centered ">
                                <strong class="has-text-danger ">Este instructor no existe!</strong>
                            </div>';
                        }
                    } else {
                        echo '
                        <br>
                        <div class="modal-advertencia has-text-centered ">
                            <strong for="instructor" class="has-text-danger ">No se ha seleccionado un instructor!</strong>
                        </div>';
                    }
                    ?>

                <?php
                    if (!empty($nombresAprendices)) {
                        echo '
                        <label for="aprendiz-lista" class="label" >Aprendiz:</label>
                        <select  id="aprendiz-lista" class="my-select" required name="nombre_aprendiz_permiso">
                        <option value="" disabled selected>Selecciona un aprendiz</option>';
                        
                        foreach ($nombresAprendices as $nombreAprendiz) {
                            echo '<option value="' . $nombreAprendiz . '">' . $nombreAprendiz . '</option>';
                        }
                        echo '</select>';
                    } else {
                        echo '
                        <br>
                        <div class="modal-advertencia has-text-centered mt-3">
                            <strong class="has-text-danger ">!No hay aprendices!</strong>
                        </div>';
                    }
                ?>
                <?php
                    $tituladaValue = $fichaValue = $ambienteValue = '';
                    // Verificar si se ha seleccionado un instructor
                    if (!is_null($instructorSeleccionado)) {
                        // Consulta SQL para obtener los datos del instructor seleccionado
                        $sqlInstructorData = "SELECT titulada, ficha, ambiente FROM instructores WHERE id_instructor = $instructorSeleccionado";
                        $resultadoInstructorData = $db->query($sqlInstructorData);

                        // Verificar si la consulta fue exitosa
                        if ($resultadoInstructorData) {
                            // Verificar si hay resultados
                            if ($resultadoInstructorData->num_rows > 0) {
                                $filaInstructorData = $resultadoInstructorData->fetch_assoc();
                                $tituladaValue = $filaInstructorData['titulada'];
                                $fichaValue = $filaInstructorData['ficha'];
                                $ambienteValue = $filaInstructorData['ambiente'];
                            }
                        } else { 
                            // Manejar el error de la consulta- pendiente
                            echo "Error en la consulta: " . $db->error;
                        }
                    }
                ?>
                
            <div>
                <label for="titulada" class="label" >Titulada:</label>
                <input type="text" id="titulada" required placeholder="Selecciona un instructor."  name="titulada_permiso" require readonly value="<?php echo $tituladaValue; ?>" />
            </div>
            <div class="div-ficha-ambiente">
                <div>
                    <label for="ficha" class="label" >Ficha:</label>
                    <input type="text" min="5" max="11" id="ficha" required placeholder="Selecciona un instructor." name="ficha_permiso" require readonly value="<?php echo $fichaValue; ?>" />
                </div>
                <div>
                    <label for="ambiente" class="label" >Ambiente:</label>

                    <input type="text" id="ambiente" required placeholder="Selecciona un instructor." name="ambiente_permiso" require readonly value="<?php echo $ambienteValue; ?>" />
                </div>
            </div>
            <label for="motivo" class="label" >Motivo de la salida:</label>
            <textarea id="motivo" rows="3" cols="8" placeholder="" maxlength="40" name="motivo_permiso" required></textarea>

            <input type="hidden" id="email" name="emailUsuario" value="<?= $_SESSION['usuario']['correo_usuario']?>">
            <input type="hidden" name="mensaje">

            <div class="is-flex is-justify-content-center p-3">
                <div class="py-3">
                    <button id="botonEnviar" type="submit" class="my-button button-clr-verde" name="botonEnviar">
                    <img src="images/iconos/enviar-icon-b.svg"  class="icon" alt="">Enviar Permiso</button>
                </div>
            </div>
        </form>
        <!-- termna hoja -->
        <?php BorrarErrores(); ?>

    </div>
    <article class="box" width="100%"> 
        <h3 class="">
        DATOS PARA PERMISOS
        </h3>
        <p class="">
            para agregar datos.
        </p>
        <br>
        <div class="my-center-gap">    
            <a href="index.php?vista=datos_instructores_aprendices" class="my-button button-clr-azul">
                <img src="images/iconos/ojo-icon-b.svg"  class="icon" alt="">Ver datos
            </a>
        </div>    
    </article> 
    </div>
