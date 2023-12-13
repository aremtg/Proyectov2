<?php
$id = (isset($_GET['aprendiz_id'])) ? $_GET['aprendiz_id']: 0;
$id = limpiar_cadena($id);

$sql = "SELECT CONCAT(u.nombre_usuario,' ',u.apellido_usuario)AS 'nombre usuario',
ti.nombre_titulada,
ti.ficha_titulada,
art.nombre_articulo,
art.nombre_articulo_2,
a.*
FROM aprendices a 
INNER JOIN usuarios u ON u.id_usuario = a.id_usuario
INNER JOIN tituladas ti ON ti.id_titulada = a.id_titulada 
INNER JOIN articulos art ON art.id_articulo = a.id_articulo
WHERE id_aprendiz = $id;";

$check = mysqli_query($db, $sql);

if(mysqli_num_rows($check)==1){
    $datos = mysqli_fetch_assoc($check);
}?>
<div class='box'>


</div>
<article class="panel-heading"> 
    <h3 class="" >DATOS DEL APRENDIZ</h3>
    <p class="">Registrado por <?=$datos['nombre usuario'] ?> </p>     
</article>

<div class="mt-3 is-flex box">
    <div class="columns p-4">
        <div class="column p-0">
            <h1 class="title is-6 m-0">Tipo de Documento</h1>
            <p class="is-size-6 mt-2"><?= $datos['tipoDoc_aprendiz']; ?></p>
        </div>

        <div class="column p-0">
            <h1 class="title is-6 m-0">N° Documento </h1>
            <p class="is-size-6 mt-2"><?= $datos['documento'];?></p>
        </div>

        <div class="column p-0">
            <h1 class="title is-6 m-0">Nombres</h1>
            <p class="is-size-6 mt-2"><?= $datos['nombre_aprendiz'];?></p>
        </div>
    </div>
</div>

<div class="mt-3 is-flex box">
    <div class="columns p-4">
    <div class="column p-0">
            <h1 class="title is-6 m-0">Apellidos</h1>
            <p class="is-size-6 mt-2"><?= $datos['apellido_aprendiz'];?></p>
        </div>

        <div class="column p-0">
            <h1 class="title is-6 m-0">Correo</h1>
            <p class="is-size-6 mt-2"><?= $datos['email_aprendiz'];?></p>
        </div>

        <div class="column p-0">
            <h1 class="title is-6 m-0">N° Contacto</h1>
            <p class="is-size-6 mt-2"><?= $datos['celular'];?></p>
        </div>
    </div>
</div>
<div class="mt-3 is-flex box">
    <div class="columns p-4">
    <div class="column p-0">
            <h1 class="title is-6 m-0">Titulada</h1>
            <p class="is-size-6 mt-2"><?= $datos['nombre_titulada'];?></p>
        </div>

        <div class="column p-0">
            <h1 class="title is-6 m-0">ficha</h1>
            <p class="is-size-6 mt-2"><?= $datos['ficha_titulada'];?></p>
        </div>

        <div class="column p-0">
            <h1 class="title is-6 m-0">Fecha Registro</h1>
            <p class="is-size-6 mt-2"><?= $datos['fecha'];?></p>
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
    <div class="columns p-4">
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
    <div class="columns p-4">
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

<?php include('./includes/btn_back.php'); ?>


