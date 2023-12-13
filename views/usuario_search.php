<article class="panel-heading"> 
    <h3 class="is-size-2">
        Buscar usuario
    </h3>

    <p class="is-size-6">
        Recuerda que puedes buscar el usuario por nombres o numero de documento!
    </p>     

    </article>

    <ul class="ul-mini-nav">
        <li >
            <a href="index.php?vista=usuario_nuevo">
                <span>AGREGAR</span>
            </a>
        </li>

        <li >
            <a href="index.php?vista=usuarios_lista">
                <span>LISTA USUARIOS</span>
            </a>
        </li>

        <li class="is-active" href="index.php?vista=usuario_search">
            <a>
                <span>BUSCAR</span>
            </a>
        </li>
    </ul>

    <?php
    if(isset($_POST['modulo_buscador'])){
        
        require_once("./php/buscador.php");
    }
    if(!isset($_SESSION['busqueda_usuario'])&& empty($_SESSION['busqueda_usuario'])){
    ?>

            <form action="" method="POST" autocomplete="off" >
                <input type="hidden" name="modulo_buscador" value="usuario">   
                <div class="has-text-centered is-flex is-flex-direction-column">
                        <label for="txt_buscador" class="label">Ingresa tu busqueda:</label>
                        <input class="input mb-4" type="text" name="txt_buscador" placeholder="¿Qué estas buscando?" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,30}">
                        <div>
                        <button class="button is-info px-4" type="submit">Buscar</button>
                        </div>
                    
                </div>
            </form>

    <?php }else{ ?>
        
            <form class="has-text-centered mt-6 mb-6" action="" method="POST" autocomplete="off" >
                <input type="hidden" name="modulo_buscador" value="usuario"> 
                <input type="hidden" name="eliminar_buscador" value="usuario">
                <p>Estas buscando: <strong><?php echo $_SESSION['busqueda_usuario']; ?> </strong></p>
                <button type="submit" class="button button-eliminar">Eliminar busqueda</button>
            </form>
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
    $url = "index.php?vista=usuario_search&page=";  //esta variable va a contener la url completa del sistema de la tabla
    $registros = 10;                               // esta va a mostrar el numero total de registrados en cada pagina
    $busqueda = $_SESSION['busqueda_usuario'];   //esta variable se va a usar para realizar la busqueda

    require('./php/lista_user.php');
    
}
if(isset($_SESSION['error-buscador'] )): ?>
    <?= $_SESSION['error-buscador'] ; ?>
<?php endif; ?>

<?php ob_end_flush(); ?>

