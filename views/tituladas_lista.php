<article class="panel-heading">

    <h3 class="">
        TITULADAS
    </h3>

    <p class="">
        Tituladas activas!
    </p>

</article>

<?php if (isset($_SESSION['fichaExiste'])) : ?>

    <div class='message is-danger'>
        <?= $_SESSION['fichaExiste']; ?>
    </div>

<?php elseif (isset($_SESSION['titulada'])) : ?>
    <div class='message is-success '>
        <?= $_SESSION['titulada']; ?>
    </div>
<?php elseif (isset($_SESSION['titulada-error'])) : ?>
    <div class='message is-danger'>
        <?= $_SESSION['titulada-error']; ?>
    </div>
<?php endif; ?>
<!-- 
<div class="mb-3">
<?php echo isset($_SESSION['errores']) ? mostrarAlerta($_SESSION['errores'], 'nombreTitulada') : ""; ?>
<?php echo isset($_SESSION['errores']) ? mostrarAlerta($_SESSION['errores'], 'ficha') : ""; ?>
</div> -->

<ul class="ul-mini-nav">
    <li>
        <a class="js-modal-trigger" data-target="modal_agg_titulada">
            <span>AGREGAR</span>
        </a>
    </li>

    <li class="is-active">
        <a>
            <span>LISTA TITULADAS</span>
        </a>
    </li>
</ul>
<div>
    <?php
    if (!isset($_GET['page'])) {
        $pagina = 1;
    } else {
        $pagina = (int)$_GET['page'];

        if ($pagina <= 1) {
            $pagina = 1;
        }
    }

    $pagina = limpiar_cadena($pagina);
    $url = "index.php?vista=tituladas_lista&page=";  //esta variable va a contener la url completa del sistema de la tabla
    $registros = 10;                               // esta va a mostrar el numero total de registrados en cada pagina
    $busqueda = "";                                //esta variable se va a usar para realizar la busqueda

    require('./php/lista_tituladas.php');
    ?>
</div>

<!-- ####### ESTE ES EL MODAL PARA AGREGAR TITULADAS VA UNIDO AL BOTON AGREGAR EN LA LINEA 17 ####### -->
<div class="modal" id="modal_agg_titulada">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <h3 class="modal-card-title">Agregar Titulada</h3>
            <button class="delete" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
            <!-- Contenido del modal-->
            <form action="./php/guardar_titulada.php" class="box-modal" method="POST" autocomplete="off" id="modal-tituladas">
                <div class="columns">
                    <label for="nombre_titulada" class="label">Nombre Titulada:</label>
                    <input class="input" type="text" name="nombre_titulada" pattern="[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}">
                </div>

                <div class="columns">
                    <label for="ficha" class="label">Ficha Titulada:</label>
                    <input type="text" name="ficha" class="input" pattern="[0-9]{3,10}">
                </div>

                <div class="checkbox">
                    <label for="jornada" class="label">Jornada</label>
                    <div class="control select">
                        <select name="jornada">
                            <option value="Mañana">Mañana</option>
                            <option value="Tarde">Tarde</option>
                            <option value="Noche">Noche</option>
                        </select>
                    </div>
                </div>

                <footer class="box-button">
                    <button type="submit" class="my-button button-clr-azul"><img src="./images/save.png" class="mr-1">Agregar</button>
                </footer>

    
            </form>
        </section>
    </div>
</div>
<!-- SE ACABA LA SECCION DEL MODAL -->


<?php BorrarErrores(); ?>
<script src="./js/modal.js"></script>