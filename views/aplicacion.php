<?php require_once('../php/main.php');
    require_once('../php/conexion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresos</title>
    <link rel="stylesheet" href="../css/aplicacion.css">
    <link rel="stylesheet" href="../css/bulma.min.css">
</head>
<body>
        <form action="./resultado_aplicacion.php" method="POST" autocomplete="off" >
            
        <article class="panel-heading mb-3"> 
            <label for="input-doc" class="label is-flex">Ingrese el documento del aprendiz</label>
        </article>
        <input class="input" id="input-doc" type="text" placeholder="# Documento" name="consulta" >

        <button type="submit" class="my-button btn-ingresar is-flex">Ingresar</button>      
               

            <?php echo isset($_SESSION['errores']) ? mostrarAlerta($_SESSION['errores'],'documento'):"" ?>
        </form>
    <?php BorrarErrores(); ?>

</body>
</html>
