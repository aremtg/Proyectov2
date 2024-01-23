<?php 
require_once('../php/conexion.php');
require_once('../php/main.php');

$documento = limpiar_cadena($_POST['consulta']);
$errores = [];

if(empty($documento)){
    $errores['documento'] = "Define el documento del aprendiz";
}else{
    if(!is_numeric($documento)){
    $errores['documento'] = "El documento ingresado no es valido";
    }
}

if(count($errores)==0){

    $sql = "SELECT a.*, art.nombre_articulo, art.nombre_articulo_2 FROM aprendices a 
    INNER JOIN articulos art ON a.id_articulo = art.id_articulo 
    WHERE documento = $documento;";
    $execute = mysqli_query($db, $sql);

    if(mysqli_num_rows($execute)==1){

        $datos = mysqli_fetch_assoc($execute);
        $id_registro = $datos['id_aprendiz'];

        date_default_timezone_set('America/Bogota');
        $fechaActual = date("Y-m-d"); // Obtiene la fecha actual en formato 'AÑO-MES-DIA'
        $horaActual = date("H:i:s"); // Obtiene la hora actual en formato 'HH:MM:SS'

        $insercion = "INSERT INTO registro VALUES(null, $id_registro,'$fechaActual','$horaActual');";
        $execute_insercion = mysqli_query($db, $insercion);

?>

    <!-- SECTION PARA MOSTRAR EL CONTENIDO DE LA PAGINA -->
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/bulma.min.css">
        <link rel="stylesheet" href="../css/aplicacion.css">
        
        <title>Aprendiz</title>
    </head>
    <body>
    <div class="contenedor_contenido ">
        <div class="box">
            <article class="panel-heading mb-3"> 
                <div class="is-flex">
                    <p class="" >Datos del aprendiz</p>
                </div>
                    <h3 class="is-size-6 mt-2"></h3>     
            </article>

            <div class="mt-3">
                <div class="columns box mb-5">

                    <div class="column p-0">
                        <h1 class="title is-6 m-0">No Documento </h1>
                        <p class="is-size-6 mt-2"><?= $datos['documento'];?></p>
                    </div>

                    <div class="column p-0">
                        <h1 class="title is-6 m-0">Nombre Completo</h1>
                        <p class="is-size-6 mt-2"><?= $datos['nombre_aprendiz'].' '.$datos['apellido_aprendiz'];?></p>
                    </div>
                </div>
            </div>

            <article class="panel-heading mb-3"> 
                <div class="is-flex">
                        <p class="" >Articulos del aprendiz</p>
                </div>
                    <h3 class="is-size-6 mt-2"></h3>     
            </article>

            <div class="mt-3">
                <div class="columns box mb-5">
                    <div class="column p-0">
                        <h1 class="title is-6 m-0">Articulo 1</h1>
                        <p class="is-size-6 mt-2"><?= $datos['nombre_articulo'];?></p>
                    </div>
                    <div class="column p-0">
                        <h1 class="title is-6 m-0">Codigo 1</h1>
                        <p class="is-size-6 mt-2"><?= $datos['serial_articulo_1']; ?></p>
                    </div>

                    <div class="column p-0">
                        <h1 class="title is-6 m-0">Descripcion 1</h1>
                        <p class="is-size-6 mt-2"><?= $datos['descrpcion_articulo_1'];?></p>
                    </div>
                </div>
            </div>
            <div>
                <div class="columns box mb-5">
                    <div class="column p-0">
                        <h1 class="title is-6 m-0">Articulo 2</h1>
                        <p class="is-size-6 mt-2"><?= $datos['nombre_articulo_2'];?></p>
                    </div>
                    <div class="column p-0">
                        <h1 class="title is-6 m-0">Codigo 2</h1>
                        <p class="is-size-6 mt-2"><?= $datos['serial_articulo_2']; ?></p>
                    </div>

                    <div class="column p-0">
                        <h1 class="title is-6 m-0">Descripcion 2</h1>
                        <p class="is-size-6 mt-2"><?= $datos['descrpcion_articulo_2'];?></p>
                    </div>
                </div>
            </div>

            <div class="">
                <a class="my-button button-clr-morado is-link" href="../php/nuevo_registro.php">Nuevo registro</a>
            </div>
        </div>
    </div>

    </body>
    </html>
    <!-- TERMINA LA SECTION PARA MOSTRAR EL CONTENIDO DE LA PAGINA -->



    <?php }else{
        $errores['documento']= "No se encontraron registros para este aprendiz";
        $_SESSION['errores'] = $errores;
        header('location:./aplicacion.php');
    }

}else{
$_SESSION['errores'] = $errores;
header('location:./aplicacion.php');
}

mysqli_close($db);
?>