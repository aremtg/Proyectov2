<?php 
require_once('conexion.php');
require_once('main.php');

// Si se envía el formulario para agregar un nuevo instructor
if (isset($_POST['nombre_instructor']) && isset($_POST['contacto'])) {
    $nombreInstructor = $_POST['nombre_instructor'];
    $contactoInstructor = $_POST['contacto'];

    // Realizar la inserción del instructor en la tabla de instructores
    $sqlInsertInstructor = "INSERT INTO instructores (nombre, contacto) VALUES ('$nombreInstructor', '$contactoInstructor')";

    if ($db->query($sqlInsertInstructor) !== TRUE) {
        echo "Error al agregar el instructor: " . $db->error;
    } else {
        echo "Instructor agregado con éxito.";
    }
}
if (isset($_POST['instructor']) && isset($_POST['aprendiz']) && $_POST['aprendiz'] !== '') {
    $idInstructor = $_POST['instructor'];
    $aprendizNombre = $_POST['aprendiz'];

    // Realizar la inserción en la tabla de relación Instructor-Aprendiz
    $sqlInsertAprendiz = "INSERT INTO relacion_instructor_aprendiz (id_instructor, nombre_aprendiz) VALUES ('$idInstructor', '$aprendizNombre')";

    if ($db->query($sqlInsertAprendiz) !== TRUE) {
        echo "Error al agregar el aprendiz: " . $db->error;
    } else {
        echo "Aprendiz agregado con éxito.";
    }
} else {
    echo "El campo de aprendiz está vacío o no se proporcionó ningún nombre.";
}



mysqli_close($db);
header('location:../index.php?vista=datos_permisos');


?>

