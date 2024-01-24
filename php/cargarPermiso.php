<?php 
require_once('conexion.php');
require_once('main.php');

if(isset($_POST['permisoGenerado'])) {
    $permiso_generado = $_POST['permisoGenerado'];
    
    //Insertar imagen en la base de datos
    $insertar = $db->query("INSERT into archivoPermiso (archivo_permiso, creado) VALUES ('$permiso_generado', now())");
    // COndicional para verificar la subida del fichero
    if($insertar){
        echo "Archivo Subido Correctamente.";
    }else{
        echo "Ha fallado la subida, reintente nuevamente.";
    } 
   
}else{
    echo "Por favor seleccione imagen a subir.";
}


mysqli_close($db);
header('location:../index.php?vista=papel_permisos');
?>