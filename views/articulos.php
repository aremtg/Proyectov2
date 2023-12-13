<?php require_once('./php/conexion.php'); ?>
<article class="panel-heading"> 
    <h3 class="" >ARTICULOS</h3>
    <p class="">
        Articulos registrados!
    </p>     
</article>

    <ul class="ul-mini-nav">
        <li>
            <a href="index.php?vista=articulo_nuevo">
                <span>AGREGAR</span>
            </a>
        </li>

        <li class="is-active">
            <a href="index.php?vista=articulos">
                <span>LISTA ARTICULOS</span>
            </a>
        </li>
    </ul>


<!-- SECCION PARA EL BUSCADOR CON PHP -->
<div class="box_buscador">
    <form action="" method="POST" autocomplete="off">
            <label for="search" class="label">Buscar articulo con PHP</label>
            <input class="input" type="search" name="busqueda"> 
            <button class="my-button is-link" type="submit" name="enviar">Buscar</button>
    </form>
    <?php $where="";

    if(isset($_POST['enviar'])){
        $busqueda = $_POST['busqueda'];
            if (isset($_POST['busqueda'])){
                $where = "WHERE nombre_articulo LIKE '%".$busqueda."%'";
            }

    } ?>
    <!-- TERMINA LA SECCION DEL BUSCADOR -->

    <!-- SECCION PARA EL BUSCADOR CON js -->
    <form>
        <label for="search" class="label">Buscar articulo con JS</label>
        <input class="light-table-filter input" data-table="table_id" type="text">
        <button class="my-button is-link" type="submit" name="enviar">Buscar</button>
    </form>
</div> 
<!-- TERMINA LA SECCION DEL BUSCADOR -->
<hr>
<table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth table_id">
    <thead>
        <tr>
            <th class="has-text-centered">#</th>
            <th class="has-text-centered">Nombre Articulo 1</th>
            <th class="has-text-centered">Nombre Articulo 2</th>
        </tr>
    </thead>
    <tbody>
<?php 
$resultado = obtenerDatos($db,'articulos',$where);
$contador = 1;
while($datos = mysqli_fetch_array($resultado)){
    
    ?>

        <tr class="has-text-centered">
            <td><?= $contador;?></td>
            <td><?= $datos['nombre_articulo']?></td>
            <td><?= $datos['nombre_articulo_2']?></td>
        </tr>

<?php $contador++; 
    }; ?>     

    </tbody>
</table>

<script src="./js/buscador.js"></script>