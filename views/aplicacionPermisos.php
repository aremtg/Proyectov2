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
    <title>Galería de Imágenes</title>
    <!-- Enlaza aquí tus estilos CSS -->
    <link rel="stylesheet" href="../css/aplicacionPermiso.css">
    <link rel="stylesheet" href="../css/bulma.min.css">
</head>
<body>
<div class="contenedor_contenido">
 <div class="is-flex flex-wrap ">
        <?php
        $result = $db->query("SELECT imagenes FROM imagenes_tabla");

        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $imagen = $fila['imagenes'];
                echo '<div class="">
                <img width="auto" class="" src="'.($imagen) . '" />
                </div>';
            }
        } else {
            echo '<div class="is-flex has-text-primary">
            <h1>No existen imágenes en la base de datos.</h1>
            </div>';
        }
        $db->close();
        ?>
    </div>

</div>
   
</body>
</html>
