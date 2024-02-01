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
    <link rel="stylesheet" href="../css/aplicacionPermiso.css">
    <link rel="stylesheet" href="../css/crear_permisos.css">
    <link rel="stylesheet" href="../css/bulma.min.css">
</head>
<body>
<div class="contenedor_contenido">
 <div class="is-flex is-flex-wrap-wrap columns is-centered is-vcentered ">
        <?php
        $result = $db->query("SELECT 
        hora_permiso,
         fecha_permiso,
          nombre_instructor_permiso,
           nombre_aprendiz_permiso,
            titulada_permiso,
             ficha_permiso,
              ambiente_permiso,
               motivo_permiso FROM permisosdata");

        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $hora = $fila['hora_permiso'];
                $fecha = $fila['fecha_permiso'];
                $nombreInstructor = $fila['nombre_instructor_permiso'];
                $nombreAprendiz = $fila['nombre_aprendiz_permiso'];
                $titulada = $fila['titulada_permiso'];
                $ficha = $fila['ficha_permiso'];
                $ambiente = $fila['ambiente_permiso'];
                $motivo =$fila['motivo_permiso'];
                
                echo '<div class="hoja px-4 py-4" id="hoja"  >
                <div class="fecha-hora px-2">
                    <div class="is-flex ">
                        <input type="time" class="hora" name="hora_permiso" value="'. $hora . '" readonly />
                    </div>          
                    <div class="fecha">
                    '. $fecha . '
                    </div>
                </div>
    
                <label for="nombreInstructorPermiso" class="label">Instructor:</label>
                <input type="text" id="nombreInstructorPermiso" value="' . $nombreInstructor . '" readonly name="nombre_instructor_permiso"><br>
                
                <label class="label">Aprendiz:</label>
                    <input type="text" id="titulada" name="titulada_permiso" require readonly value="'. $nombreAprendiz . '" />

            <div>
                <label for="titulada" class="label">Titulada:</label>
                <input type="text" id="titulada" name="titulada_permiso" require readonly value="' . $titulada . '" />
            </div>
            <div class="div-ficha-ambiente">
                <div>
                    <label for="ficha" class="label">Ficha:</label>
                    <input type="text" min="5" max="11" id="ficha" name="ficha_permiso" require readonly value="' . $ficha . '" />
                </div>
                <div>
                    <label for="ambiente" class="label">Ambiente:</label>
                    <input type="text" id="ambiente" name="ambiente_permiso" require readonly value="' . $ambiente . '" />
                </div>
            </div>
            <label for="motivo" class="label">Motivo de la salida:</label>
            <textarea id="motivo" rows="3" cols="8" placeholder="" maxlength="40" name="motivo_permiso" disabled style="resize: none;">' . $motivo . '</textarea>
    
            <div class="is-flex is-justify-content-center p-3">
                <div class="py-3">
                    <button id="botonEnviar" type="submit" class="my-button button-clr-azul">ver detalles</button>
                </div>
            </div>
        </div>';
            }
        } else {
            echo '<div class="is-flex has-text-primary has-text-centered">
            <h1>No existen imágenes en la base de datos.</h1>
            </div>';
        }
        $db->close();
        ?>
    </div>
    

</div>
   
</body>
</html>
