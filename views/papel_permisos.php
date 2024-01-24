<?php 
date_default_timezone_set("America/Bogota");
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
    <div class="hoja" id='hoja'>
    <div class="div-fecha">
    <div class="fecha"><?php echo date('Y-m-d'); ?></div>
</div>

        <div>
        <?php
        // Definir la variable $instructorSelected e inicializarla con un valor por defecto
        $instructorSelected = null;

        // Verificar si el formulario se ha enviado
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener el valor seleccionado del instructor desde $_POST
            $instructorSelected = isset($_POST['instructor']) ? limpiar_cadena($_POST['instructor']) : null;

            // Aquí puedes realizar otras acciones con el valor de $instructorSelected si es necesario
        }
        ?>

        <!-- Formulario -->
        <form action="" method="post"  >
            <label for="instructor">Instructor:</label>
            <div class='ejem'>
            <select name="instructor" id="instructor">
                <option value="" disabled selected>Selecciona una opción</option>
                    <?php
                        // Obtener la lista de instructores (como en tu primer bloque de código)
                        $sqlInstructores = "SELECT DISTINCT id_instructor, nombre FROM instructores";
                        $resultadoInstructores = $db->query($sqlInstructores);

                        while ($filaInstructores = $resultadoInstructores->fetch_assoc()) {
                            $idInstructor = $filaInstructores['id_instructor'];
                            $nombreInstructor = $filaInstructores['nombre'];

                            // Marcamos la opción seleccionada si coincide con el valor en $instructorSelected
                            $selected = ($instructorSelected == $idInstructor) ? 'selected' : '';

                            echo '
                            <option value="' . $idInstructor . '" ' . $selected . '>' . $nombreInstructor . '</option>';
                        }
                    ?>
            </select>
            <div class="box-button">   
                    <button type="submit" name="submit" >
                    <img src="images/iconos/flecha.svg"  class='icon' alt="">
                    </button>
                </div>
            </div>
        </form>
        <br>
        <?php
            // Obtener el id_instructor seleccionado del formulario
            $instructorSelected = isset($_POST['instructor']) ? $_POST['instructor'] : null;

            // Definir una variable para almacenar los nombres de aprendices relacionados
            $nombresAprendices = array();

            // Verificar si se ha seleccionado un instructor
            if (!is_null($instructorSelected)) {
                // Consulta SQL para obtener los nombres de aprendices relacionados con el id_instructor
                $sqlAprendices = "SELECT nombre_aprendiz FROM relacion_instructor_aprendiz WHERE id_instructor = $instructorSelected";
                $resultadoAprendices = $db->query($sqlAprendices);

                // Verificar si hay resultados
                if ($resultadoAprendices->num_rows > 0) {
                    while ($filaAprendices = $resultadoAprendices->fetch_assoc()) {
                        $nombresAprendices[] = $filaAprendices['nombre_aprendiz'];
                    }
                }
            }
        ?>
        <!-- Mostrar opciones de aprendices relacionados -->
        <?php
        if (!empty($nombresAprendices)) {
            echo '
            <label for="aprendiz-lista">Aprendiz:</label>
            <select name="aprendiz" id="aprendiz-lista">
            <option value="" disabled selected>Selecciona una opción</option>';
            
            foreach ($nombresAprendices as $nombreAprendiz) {
                echo '<option value="' . $nombreAprendiz . '">' . $nombreAprendiz . '</option>';
            }
            echo '</select>';
        } else {
            echo '<div class="modal-advertencia has-text-centered ">
            <strong class="has-text-danger ">No hay aprendices!</strong></div>';
        }
        ?>
        <?php 
            // Definir variables para almacenar los valores
        $tituladaValue = $fichaValue = $ambienteValue = '';

        // Verificar si se ha seleccionado un instructor
        if (!is_null($instructorSelected)) {
            // Consulta SQL para obtener los datos del instructor seleccionado
            $sqlInstructorData = "SELECT ntitulada, ficha, ambiente FROM instructores WHERE id_instructor = $instructorSelected";
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

        <!-- Mostrar campos de instructores -->
        <div>
            <label for="titulada">Titulada:</label>
            <input type="text" id="titulada" name="name_titulada" value="<?php echo $tituladaValue; ?>" />
        </div>
        <div class="div-ficha-ambiente">
            <div>
                <label for="ficha">Ficha:</label>
                <input type="text" id="ficha" name="ficha" value="<?php echo $fichaValue; ?>" />
            </div>
            <div>
                <label for="ambiente">Ambiente:</label>
                <input type="text" id="ambiente" name="name_ambiente" value="<?php echo $ambienteValue; ?>" />
            </div>
        </div>
        <div class="div-hora">
            <label for="hora">Hora de salida:</label>
            <div id="hora" class="hora"></div>
                <div class="periodo"></div>
            </div>
            <div class="div-motivo">
                <label for="motivo">Movitivo de la salida:</label>
                <textarea id="motivo" rows="4" cols="50"></textarea>
            </div>
        </div>
    </div>
    <div class=" is-flex is-flex-direction-column is-justify-content-center p-3">
     <div class="resultado py-3">
        <form method="POST" action="./php/cargarImagen.php" enctype="multipart/form-data">
            <input type="hidden" id='permisoGenerado' name="permisoGenerado" value="">
            <button id="botonEnviar" type="submit" class="my-button button-clr-azul">Enviar Permiso</button>
            <!-- aun no se deja de intentar guardar solo.. -->
        </form>
    </div>
    <div class="box-button">    
            <a href="index.php?vista=datos_permisos" class="my-button button-clr-morado">
                <span for="registro-aprendiz">Ver datos</span>
            </a>
                <button class="btn-generar-permiso my-button button-clr-verde" onclick="convertirPermisoAPDF()">Generar</button>
    </div>
  </div>
</div>
    

 
   

