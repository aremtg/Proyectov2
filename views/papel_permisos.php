<?php 
date_default_timezone_set("America/Bogota");
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
    <div class="cont_generador">
        <form action="" method="post">
            <label for="instructor" class="label" >Instructor:</label>
            <div class='my-flex-center'  width='100%' >
                <select name="instructor" class='my-select' id="instructor" width='100%'>
                    <option value="" disabled selected>Selecciona un instructor</option>
                        <?php
                            // Obtener la lista de instructores (como en tu primer bloque de código)
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
                <div class="box-button">   
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
                $resultadoAprendices = $db->query($sqlAprendices);

                // Verificar si hay resultados
                if ($resultadoAprendices->num_rows > 0) {
                    while ($filaAprendices = $resultadoAprendices->fetch_assoc()) {
                        $nombresAprendices[] = $filaAprendices['nombre_aprendiz'];
                    }
                }
            }
        ?>
        <br>
        <div class="hoja" id='hoja'>
                <div class="fecha-hora px-2">
                    <div class="is-flex ">
                    <input type="time" class="hora" readonly disabled name="hora" />
                    </div>
                    <div class="fecha">
                        <?php echo date('Y-m-d'); ?>
                    </div>
                </div>
                <?php
                    $nombreInstructor = '';
                    if (isset($_POST['submit'])) {
                        $sqlNombreInstructor = "SELECT nombre FROM instructores WHERE id_instructor = $instructorSeleccionado";
                        $resultadoNombreInstructor = $db->query($sqlNombreInstructor);

                        // Verifica si se obtuvo el nombre del instructor correctamente
                        if ($resultadoNombreInstructor && $filaNombreInstructor = $resultadoNombreInstructor->fetch_assoc()) {
                            $nombreInstructor = $filaNombreInstructor['nombre'];
                        }
                    }
                ?>
     
                <?php
                if (!empty($nombreInstructor)) {
                    echo '
                    <label for="nombreInstructorPermiso" class="label" >Instructor:</label>
                    <input type="text"  id="nombreInstructorPermiso" value="' . $nombreInstructor . '" readonly name="nombre_instructor_permiso"><br>';
                } else {
                    echo '<div class="modal-advertencia has-text-centered ">
                    <strong class="has-text-danger ">No se ha selecionado instructor!</strong></div> <br>';
                }
                ?>
        
                <?php
                    if (!empty($nombresAprendices)) {
                        echo '
                        <label for="aprendiz-lista" class="label" >Aprendiz:</label>
                        <select  id="aprendiz-lista" class="my-select" name="nombre_aprendiz_permiso">
                        <option value="" disabled selected>Selecciona un aprendiz</option>';
                        
                        foreach ($nombresAprendices as $nombreAprendiz) {
                            echo '<option value="' . $nombreAprendiz . '">' . $nombreAprendiz . '</option>';
                        }
                        echo '</select>';
                    } else {
                        echo '<div class="modal-advertencia has-text-centered mt-3">
                        <strong class="has-text-danger ">No hay aprendices!</strong></div>';
                    }
                ?>
                <?php 
                    $tituladaValue = $fichaValue = $ambienteValue = '';

                    // Verificar si se ha seleccionado un instructor
                    if (!is_null($instructorSeleccionado)) {
                        // Consulta SQL para obtener los datos del instructor seleccionado
                        $sqlInstructorData = "SELECT ntitulada, ficha, ambiente FROM instructores WHERE id_instructor = $instructorSeleccionado";
                        $resultadoInstructorData = $db->query($sqlInstructorData);

                        // Verificar si hay resultados
                        if ($resultadoInstructorData->num_rows > 0) {
                            $filaInstructorData = $resultadoInstructorData->fetch_assoc();
                            $tituladaValue = $filaInstructorData['ntitulada'];
                            $fichaValue = $filaInstructorData['ficha'];
                            $ambienteValue = $filaInstructorData['ambiente'];
                        }
                    }
                ?>
            <!-- Mostrar campos de titulada, icha y ambiente a su cargo -->
            <div>
                <label for="titulada" class="label" >Titulada:</label>
                <input type="text" id="titulada" name="titulada_permiso" require readonly value= "<?php echo $tituladaValue; ?>" />
            </div>

            <div class="div-ficha-ambiente">
                <div>
                    <label for="ficha" class="label" >Ficha:</label>
                    <input type="text" id="ficha" name="ficha_permiso" require readonly value="<?php echo $fichaValue; ?>" />
                </div>
                <div>
                    <label for="ambiente" class="label" >Ambiente:</label>
                    <input type="text" id="ambiente" name="ambiente_permiso" require readonly value="<?php echo $ambienteValue; ?>" />
                </div>
            </div>
                <label for="motivo" class="label" >Motiivo de la salida:</label>
                <textarea id="motivo" rows="4" cols="8" placeholder="" maxlength="40" name="motivo_permiso"></textarea>
        
        </div>
        <!-- termna hoja -->
        <div class=" is-flex is-flex-direction-column is-justify-content-center p-3">
            <div class="resultado py-3">
                <form method="POST" action="./php/cargarPermiso.php" enctype="multipart/form-data">
                <input type="hidden" name="permisoGenerado" id="permisoGenerado" value="">
                    <button id="botonEnviar" type="submit" class="my-button button-clr-azul">Enviar Permiso</button>
                   
                </form>
            </div>
        </div>
        <div class="box-button">    
            <a href="index.php?vista=datos_permisos" class="my-button button-clr-morado">
                <span for="registro-aprendiz">Ver datos</span>
            </a>
            <button class="btn-generar-permiso my-button button-clr-verde" onclick="convertirPermisoAPDF()">Generar</button>
        </div>
    </div>



   

