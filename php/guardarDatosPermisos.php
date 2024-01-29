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
    $instructor = $db->limpiar_cadena($datosFormulario['instructor']);
    $aprendiz = $db->limpiar_cadena($datosFormulario['aprendiz']);
    $titulada = $db->limpiar_cadena($datosFormulario['titulada']);
    $ficha = $db->limpiar_cadena($datosFormulario['ficha']);
    $ambiente = $db->limpiar_cadena($datosFormulario['ambiente']);
    $hora = $db->limpiar_cadena($datosFormulario['hora']);
    $motivo = $db->limpiar_cadena($datosFormulario['motivo']);
    $usuario = $db->limpiar_cadena($datosFormulario['usuario']);

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
