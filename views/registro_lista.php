<article class="panel-heading"> 

        <h3 class="">
        REGISTROS
        </h3>
        <p class="">
                Todos los registros!
        </p>     
</article>
<div >
    <?php if(isset($_SESSION['delete'])): ?>
        <div class='message is-danger'>
            <?= $_SESSION['delete'];?>
        </div>
    <?php endif;  ?>
    <?php BorrarErrores(); ?>
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
        $url="index.php?vista=registro_lista&page=";  //esta variable va a contener la url completa del sistema de la tabla
        $registros=8;                               // esta va a mostrar el numero total de registrados en cada pagina
        $busqueda="";                                //esta variable se va a usar para realizar la busqueda

        require_once('./php/lista_registro.php');
        
    ?>
</div>
