<?php 
require_once('conexion.php');
require_once('main.php');

if (isset($_POST['hora_permiso'])
    && isset($_POST['fecha_permiso'])
    && isset($_POST['nombre_instructor_permiso']) 
    && isset($_POST['nombre_aprendiz_permiso']) 
    && isset($_POST['titulada_permiso']) 
    && isset($_POST['ficha_permiso'])
    && isset($_POST['ambiente_permiso'])
    && isset($_POST['motivo_permiso'])) 
{
    $hora_permiso = $_POST['hora_permiso'];
    $fecha_permiso = $_POST['fecha_permiso'];  
    $nombre_instructor_permiso = limpiar_cadena($_POST['nombre_instructor_permiso']);
    $nombre_aprendiz_permiso = limpiar_cadena($_POST['nombre_aprendiz_permiso']);
    $titulada_permiso = limpiar_cadena($_POST['titulada_permiso']);
    $ficha_permiso = limpiar_cadena($_POST['ficha_permiso']);
    $ambiente_permiso = limpiar_cadena($_POST['ambiente_permiso']);
    $motivo_permiso = limpiar_cadena($_POST['motivo_permiso']);

    // Insertar en la base de datos
    $sql = $db->query("INSERT INTO permisosData (
        id,
        hora_permiso,
        fecha_permiso,
        nombre_instructor_permiso, 
        nombre_aprendiz_permiso,
        titulada_permiso,
        ficha_permiso,
        ambiente_permiso,
        motivo_permiso,
        creado) VALUES (
        null,
        '$hora_permiso',
        '$fecha_permiso',
        '$nombre_instructor_permiso',
        '$nombre_aprendiz_permiso',
        '$titulada_permiso',
        '$ficha_permiso',
        '$ambiente_permiso',
        '$motivo_permiso',
        now())");

    if($sql){
        alert("Archivo Subido Correctamente");
    
    }else{
        echo "Ha fallado la subida, reintente nuevamente.";
    } 
   
}else{
    echo "Por favor seleccione imagen a subir.";
}

mysqli_close($db);
header('location:../index.php?vista=crear_permisos');
?>
