    <article class="panel-heading"> 
    <h3 class="" ><span class="ssaci-cont">SSACI</span></h3>
            <p class="">
                Sistema de Seguimiento Acceso y Control de Ingreso...
            </p>     
    </article>
        <?php
            $totalAprendiz = obtenerRegistros($db,'aprendices','id_aprendiz',null);
            $totalUsuarios = obtenerRegistros($db,'usuarios','id_usuario',$_SESSION['usuario']['id_usuario']);
            $totaltitulada = obtenerRegistros($db,'tituladas','id_titulada',null);
            $totalarticulo = obtenerRegistros($db,'articulos','id_articulo',null);
            $totalRegistro = obtenerRegistros($db,'registro','id_registro',null);
        ?>

<div class="panel_iconos"><!--Abrimos un contenedor para los botones de navegacion-->
    <a href="index.php?vista=usuarios_lista" class="iconos">
        <h2 class="">USUARIOS</h2>
        <p class=""><?= $totalUsuarios; ?> Registrados</p>
    </a>
    <a href="index.php?vista=aprendices_lista" class="iconos">
        <h2 class="titulo_productos">APRENDICES</h2>
        <p class=""><?= $totalAprendiz; ?> Registrados</p>
    </a>

    <a href="index.php?vista=tituladas_lista" class="iconos">
        <h2 class="titulo_productos">TITULADAS</h2>
        <p class=""><?= $totaltitulada; ?> Registrados</p>
    </a>

    <a href="index.php?vista=articulos" class="iconos">
        <h2 class="titulo_productos">ARTICULOS</h2>
        <p class=""><?= $totalarticulo; ?> Registrados</p>
    </a>

    <a href="index.php?vista=articulos" class="iconos">
        <h2 class="titulo_productos">REGISTROS</h2>
        <p class=""><?= $totalRegistro; ?> Registrados</p>
    </a>
    
</div><!--cerramos contenedor para los botones de navegacion-->

<div class="box-button">
    <a href="./views/aplicacionPermisos.php" target="_blank" class="my-button button-clr-morado">Aplicacion Permisos</a>
    <a href="./views/aplicacion.php" target="_blank" class="my-button button-clr-verde">Aplicacion Ingresos</a>
</div>
