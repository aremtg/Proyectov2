<article class="panel-heading"> 
    <h3>
        USUARIOS
    </h3>
    <p class="">
        Estimado usuario, recuerde que las modificaciones realizadas en este apartado no se podran modificar despues de 24horas!
    </p>     
</article>

    <ul class="ul-mini-nav">
        <li >
            <a href="index.php?vista=usuario_nuevo">
                <span>AGREGAR</span>
            </a>
        </li>

        <li class="is-active">
            <a  href="index.php?vista=usuarios_lista">
                <span>LISTA USUARIOS</span>
            </a>
        </li>

        <li >
            <a href="index.php?vista=usuario_search">
                <span>BUSCAR</span>
            </a>
        </li>
    </ul>
<div>
<?php 
    if(!isset($_GET['page'])){
        $pagina = 1;
    }else{
        $pagina = (int)$_GET['page'];

        if($pagina <= 1){
            $pagina = 1;
        }
    }

    $pagina = limpiar_cadena($pagina);
    $url = "index.php?vista=usuario_lista&page=";  //esta variable va a contener la url completa del sistema de la tabla
    $registros = 10;                               // esta va a mostrar el numero total de registrados en cada pagina
    $busqueda = "";                                //esta variable se va a usar para realizar la busqueda

    require('./php/lista_user.php');
?>

</div>