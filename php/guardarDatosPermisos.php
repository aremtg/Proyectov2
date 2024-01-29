<?php
require_once('conexion.php');
require_once('main.php');

// Verifica si se recibieron datos del formulario
if (isset($_POST['datosFormulario'])) {
    // Decodifica los datos JSON
    $datosFormulario = json_decode($_POST['datosFormulario'], true);

    // Obtén la fecha de creación actual
    $fechaCreacion = date('Y-m-d H:i:s');

    // Obtén el nombre de quien envió el formulario
    $nombreUsuario = $_SESSION['usuario']['usuario_usuario'];

    // Escapa los datos para prevenir inyección de SQL
    $instructor = $db->real_escape_string($datosFormulario['instructor']);
    $aprendiz = $db->real_escape_string($datosFormulario['aprendiz']);
    $titulada = $db->real_escape_string($datosFormulario['titulada']);
    $ficha = $db->real_escape_string($datosFormulario['ficha']);
    $ambiente = $db->real_escape_string($datosFormulario['ambiente']);
    $hora = $db->real_escape_string($datosFormulario['hora']);
    $motivo = $db->real_escape_string($datosFormulario['motivo']);
    $usuario = $db->real_escape_string($datosFormulario['usuario']);

    // Inserta los datos en la tabla 'dataPermiso'
    $sqlInsert = "INSERT INTO dataPermiso (fecha_creacion, instructor, aprendiz, titulada, ficha, ambiente, hora, motivo, usuario)
                  VALUES ('$fechaCreacion', '$instructor', '$aprendiz', '$titulada', '$ficha', '$ambiente', '$hora', '$motivo', '$usuario')";

    if ($db->query($sqlInsert) === TRUE) {
        echo "Datos insertados con éxito";
    } else {
        echo "Error al insertar datos: " . $db->error;
    }
} else {
    echo "No se recibieron datos del formulario";
}
mysqli_close($db);
header('location:../index.php?vista=datos_permisos');
?>
