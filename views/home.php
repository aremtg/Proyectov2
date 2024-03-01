    <article class="panel-heading"> 
    <h3 class="" ><span class="ssaci-cont">SSACI</span></h3>
            <p class="">
                Sistema de Seguimiento Acceso y Control de Ingreso...
            </p>     
    </article>
    <br>
    <div class="my-center-gap">
        <a href="./views/aplicacionPermisos.php" target="_blank" class="my-button button-clr-morado">
        <img src="images/iconos/permisos-icon-b.svg" alt="">  
        Aplicacion Permisos</a>
        <a href="./views/aplicacion.php" target="_blank" class="my-button button-clr-verde">
        <img src="images/iconos/ingreso-icon-b.svg" alt="">     
        Aplicacion Ingresos</a>
    </div>
    <br>
        <?php
            $totalAprendiz = obtenerRegistros($db,'aprendices','id_aprendiz',null);
            $totalUsuarios = obtenerRegistros($db,'usuarios','id_usuario',$_SESSION['usuario']['id_usuario']);
            $totaltitulada = obtenerRegistros($db,'tituladas','id_titulada',null);
            $totalarticulo = obtenerRegistros($db,'articulos','id_articulo',null);
            $totalRegistro = obtenerRegistros($db,'registro','id_registro',null);
        ?>

<div class="panel_targetas"><!--Abrimos un contenedor para las targetas del home-->
    <a href="index.php?vista=usuarios_lista" class="targetas">
        <h2 class="">USUARIOS</h2>
        <p class=""><span><?= $totalUsuarios; ?></span> Registrados</p>
    </a>
    <a href="index.php?vista=aprendices_lista" class="targetas">
        <h2 class="titulo_productos">APRENDICES</h2>
        <p class=""><span><?= $totalAprendiz; ?></span> Registrados</p>
    </a>

    <a href="index.php?vista=tituladas_lista" class="targetas">
        <h2 class="titulo_productos">TITULADAS</h2>
        <p class=""><span><?= $totaltitulada; ?></span> Registrados</p>
    </a>

    <a href="index.php?vista=articulos" class="targetas">
        <h2 class="titulo_productos">ARTICULOS</h2>
        <p class=""><span><?= $totalarticulo; ?></span> Registrados</p>
    </a>

    <a href="index.php?vista=articulos" class="targetas">
        <h2 class="titulo_productos">REGISTROS</h2>
        <p class=""><span><?= $totalRegistro; ?></span> Registrados</p>
    </a>
    
</div><!--cerramos contenedor para las targetas del home-->
<br>
<div class="contenedor-imagen">
  <img src="images/imageprueba.jpg" class="imagen" alt="">
  <div class="degradado"></div>
</div>
