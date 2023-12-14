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
    <div class="hoja">
        <div class="div-fecha">
            <div class="fecha"><?php  ?></div>
        </div>
        <div>
            <?php
                $sql = "SELECT DISTINCT id_instructor, nombre FROM instructores";
                $resultado = $db->query($sql);

                if ($resultado->num_rows > 0) {
                    echo '<label for="instructor">Seleccionar Instructor:</label>';
                    echo '<select name="instructor" id="instructor">';
                    while ($fila = $resultado->fetch_assoc()) {
                        $id_instructor = $fila['id_instructor'];
                        $nombre_instructor = $fila['nombre'];

                        echo '<option value="' .$id_instructor . '">' . $nombre_instructor . '</option>';
                        
                    }
                    echo '</select>';
                
                } else {
                    echo 'No hay instructores disponibles, ve a agregar un instructor </br>';
                }
            ?>
            </div>
            <div>
               <!-- pendiente, no me deja ver los aprendices segun elinstructor que elija -->
                <?php
                $sql = "SELECT id_instructor, nombre_aprendiz FROM relacion_instructor_aprendiz";
                $resultado = $db->query($sql);

                if ($resultado->num_rows > 0) {
                    echo '<label for="aprendiz-lista">Aprendiz:</label>';
                    echo '<select name="aprendiz" id="aprendiz-lista">';
                    while ($fila = $resultado->fetch_assoc()) {
                         
                        $nombre_aprendiz = $fila['nombre_aprendiz'];

                        echo '<option value="' .$id_instructor . '">' . $nombre_aprendiz . '</option>';
                        
                    }
                    echo '</select>';
                
                } else {
                    echo 'No hay aprendices asignados a este instructor...</br>';
                }
            ?>
                </select>
            </div>
        <div>
            <label for="titulada">Titulada:</label>
            <input type="text" id="titulada" name="name_titulada" />
        </div>
        <div class="div-ficha-ambiente">
            <div>
                <label for="ficha">Ficha:</label>
                <input type="text" id="ficha" name="ficha"/>
            </div>
            <div>
                <label for="ambiente">Ambiente:</label>
                <input type="text" id="ambiente" name="name_ambiente" />
            </div>
        </div> 
        <div class="div-hora">
            <label for="hora">Hora de salida:</label>
            <div id="hora" class="hora"></div>
            <div class="periodo" onclick="cambiaAMPM()">a.m</div>
        </div>
        <div class="div-motivo">
            <label for="motivo">Movitivo de la salida:</label>
            <textarea id="motivo" rows="4" cols="50"></textarea>
        </div>
    </div>
  <div class=' is-flex is-flex-direction-column is-justify-content-center p-3'>
     <div class="resultado py-3">
            <form method="POST" action="./php/cargarImagen.php" enctype="multipart/form-data">
                <input type="hidden" name="imagen_generada" value='' />
                <button id="botonEnviar" type="submit" class='my-button button-clr-azul'>Enviar Permiso</button>
            </form>
    </div>
    <div class="box-button">    
            <a href="index.php?vista=datos_permisos" class="my-button button-clr-morado">
                <label for="registro-aprendiz">Ver datos</label>
            </a>
                <button class="btn-generar-permiso my-button button-clr-verde" onclick="generarPermiso()">Generar</button>
                <!-- <button class="btn-cancelar-permiso my-button button-clr-morado" onclick="cancelarPermiso()">Cancelar</button> -->
    </div>
  </div>
   
</div>
    
   
   

