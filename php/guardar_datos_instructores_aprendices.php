<?php
require_once('conexion.php');
require_once('main.php');
$errores = array();

if (isset($_POST['nombre_instructor']) && isset($_POST['contacto']) && isset($_POST['ntitulada']) && isset($_POST['ficha']) && isset($_POST['ambiente'])) {
    $nombreInstructor = limpiar_cadena($_POST['nombre_instructor']);
    $contactoInstructor = limpiar_cadena($_POST['contacto']);
    $titulada = limpiar_cadena($_POST['ntitulada']);
    $ficha = limpiar_cadena($_POST['ficha']);
    $ambiente = limpiar_cadena($_POST['ambiente']);

    // Verificar que los datos no estén vacíos
    if (!empty($nombreInstructor) && !empty($contactoInstructor) && !empty($titulada) && !empty($ficha) && !empty($ambiente)) {
        // Realizar la inserción del instructor en la tabla de instructores
        $sql = "INSERT INTO instructores (nombre, contacto, titulada, ficha,  ambiente) VALUES ('$nombreInstructor', '$contactoInstructor', '$titulada', '$ficha', '$ambiente')";
        $guardar = mysqli_query($db, $sql);
        // Ejecutar la consulta
        if ($guardar) {
            echo "Instructor agregado con éxito.";
        } else {
            echo "Error al agregar el instructor: " . mysqli_error($db);
        } } else {
            echo "Por favor, completa todos los campos del formulario de nuevo instructor.";
        }
    }
    if (isset($_POST['instructor']) && isset($_POST['aprendiz']) && $_POST['aprendiz'] !== '') {
        $idInstructor = limpiar_cadena($_POST['instructor']);
        $aprendizNombre = limpiar_cadena($_POST['aprendiz']);
    
        // Verificar que los datos no estén vacíos
        if (!empty($idInstructor) && !empty($aprendizNombre)) {
            // Verificar si ya existe un aprendiz con el mismo nombre para el instructor seleccionado
            $sql_verificar = "SELECT COUNT(*) as count FROM relacion_instructor_aprendiz WHERE id_instructor = '$idInstructor' AND nombre_aprendiz = '$aprendizNombre'";
            $resultado_verificar = mysqli_query($db, $sql_verificar);
            $row_verificar = mysqli_fetch_assoc($resultado_verificar);
    
            if ($row_verificar['count'] > 0) {
                // Si ya existe un aprendiz con el mismo nombre para este instructor, mostrar un mensaje de error
                $errores["aprendizYaExiste"] = "el aprendiz $aprendizNombre ya esta en la lista del instructor.";
            } else {
                // Si no existe un aprendiz con el mismo nombre para este instructor, insertarlo en la tabla
                $sql = "INSERT INTO relacion_instructor_aprendiz (id_instructor, nombre_aprendiz, titulada, ficha, ambiente) 
                                 SELECT id_instructor, '$aprendizNombre', titulada, ficha, ambiente
                                 FROM instructores 
                                 WHERE id_instructor = '$idInstructor'";
                $guardar = mysqli_query($db, $sql);
                // Ejecutar la consulta
                if ($guardar) {
                    $_SESSION['guardar'] = "
                    <div class='message-header title is-5 m-0'>
                        <p>Aprendiz agregado</p>
                    </div>
                    <div class='message-body is-size-6'>
                        El aprendiz se han agregado <strong>CORRECTAMENTE</strong>.
                    </div>";
                } else {
                    echo "Error al agregar el aprendiz: " . mysqli_error($db);
                }
            }
        } else {
            echo "El campo de aprendiz está vacío o no se proporcionó ningún nombre.";
        }
    }    
    $_SESSION['errores']= $errores;
mysqli_close($db);
header('location:../index.php?vista=datos_instructores_aprendices');
?>
