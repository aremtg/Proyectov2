<?php 
require_once('conexion.php');
require_once('main.php');

    // Recoger datos del formulario
    $hora_permiso = $_POST['hora_permiso'];
    $fecha_permiso = $_POST['fecha_permiso'];  
    $nombre_instructor_permiso = limpiar_cadena($_POST['nombre_instructor_permiso']);
    $nombre_aprendiz_permiso = limpiar_cadena($_POST['nombre_aprendiz_permiso']);
    $titulada_permiso = limpiar_cadena($_POST['titulada_permiso']);
    // $ficha_permiso = limpiar_cadena($_POST['ficha_permiso']); 
    $ambiente_permiso = limpiar_cadena($_POST['ambiente_permiso']);
    $motivo_permiso = limpiar_cadena($_POST['motivo_permiso']);

    var_dump($_POST['hora_permiso']);
    // Insertar en la base de datos
    $sql = "INSERT INTO permisosdata (
        id,
        hora_permiso,
        fecha_permiso,
        nombre_instructor_permiso, 
        nombre_aprendiz_permiso,
        titulada_permiso,
        ambiente_permiso,
        motivo_permiso,
        creado
    ) VALUES (
        null,
        '$hora_permiso',
        '$fecha_permiso',
        '$nombre_instructor_permiso',
        '$nombre_aprendiz_permiso',
        '$titulada_permiso',
        '$ambiente_permiso',
        '$motivo_permiso',
        now()
    )";

    $guardar = mysqli_query($db, $sql);

    if($guardar){
        echo "Archivo Subido Correctamente";
    } else {
        echo "Ha fallado la subida. Detalles del error: " . mysqli_error($db);
    } 

    mysqli_close($db);
    header('location:../index.php?vista=crear_permisos');


?>
