<?php
require_once('conexion.php');
require_once('main.php');

// Si se envía el formulario para agregar un nuevo instructor
if (isset($_POST['nombre_instructor']) && isset($_POST['contacto']) && isset($_POST['ntitulada']) && isset($_POST['ficha']) && isset($_POST['ambiente'])) {
    $nombreInstructor = limpiar_cadena($_POST['nombre_instructor']);
    $contactoInstructor = limpiar_cadena($_POST['contacto']);
    $titulada = limpiar_cadena($_POST['ntitulada']);
    $ficha = limpiar_cadena($_POST['ficha']);
    $ambiente = limpiar_cadena($_POST['ambiente']);

    // Verificar que los datos no estén vacíos
    if (!empty($nombreInstructor) && !empty($contactoInstructor) && !empty($titulada) && !empty($ficha) && !empty($ambiente)) {
        // Realizar la inserción del instructor en la tabla de instructores
        $sqlInsertInstructor = "INSERT INTO instructores (nombre, contacto, ntitulada, ficha, ambiente) VALUES ('$nombreInstructor', '$contactoInstructor', '$titulada', '$ficha', '$ambiente')";

        // Ejecutar la consulta
        if (mysqli_query($db, $sqlInsertInstructor)) {
            echo "Instructor agregado con éxito.";
        } else {
            echo "Error al agregar el instructor: " . mysqli_error($db);
        }
    } else {
        echo "Por favor, completa todos los campos del formulario de nuevo instructor.";
    }
}

// Resto del código para la relación Instructor-Aprendiz sigue igual...


if (isset($_POST['instructor']) && isset($_POST['aprendiz']) && $_POST['aprendiz'] !== '') {
    $idInstructor = limpiar_cadena($_POST['instructor']);
    $aprendizNombre = limpiar_cadena($_POST['aprendiz']);

    // Verificar que los datos no estén vacíos
    if (!empty($idInstructor) && !empty($aprendizNombre)) {
        // Realizar la inserción en la tabla de relación Instructor-Aprendiz
        $sqlInsertAprendiz = "INSERT INTO relacion_instructor_aprendiz (id_instructor, nombre_aprendiz, ntitulada, ficha, ambiente) 
                             SELECT id_instructor, '$aprendizNombre', ntitulada, ficha, ambiente
                             FROM instructores 
                             WHERE id_instructor = '$idInstructor'";

        // Ejecutar la consulta
        if (mysqli_query($db, $sqlInsertAprendiz)) {
            echo "Aprendiz agregado con éxito.";
        } else {
            echo "Error al agregar el aprendiz: " . mysqli_error($db);
        }
    } else {
        echo "Por favor, selecciona un instructor y proporciona el nombre del aprendiz.";
    }
} else {
    echo "El campo de aprendiz está vacío o no se proporcionó ningún nombre.";
}

mysqli_close($db);
header('location:../index.php?vista=datos_permisos');
?>
