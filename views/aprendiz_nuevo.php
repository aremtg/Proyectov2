
<article class="panel-heading"> 
    <h3 class="" >NUEVO APRENDIZ</h3>
    <p class="">Completa el formulario para registrar el nuevo aprendiz</p>     
</article>

    <ul class="ul-mini-nav">
        <li class="is-active">
            <a href="index.php?vista=aprendiz_nuevo">
                <span>AGREGAR</span>
            </a>
        </li>

        <li >
            <a href="index.php?vista=aprendices_lista">
                <span>LISTA APRENDICES</span>
            </a>
        </li>
    </ul>

    <?php if(isset($_SESSION['registrado'] )): ?>

        <div class='message is-success'>
        <?= $_SESSION['registrado'] ; ?>
        </div>

    <?php elseif (isset($_SESSION['errorRegistrado'])):?>
        <div class='message is-danger'>
        <?= $_SESSION['errorRegistrado'] ; ?>
        </div>
    <?php endif; ?>
    

<form action="./php/guardar_aprendiz.php" class="box-form" autocomplete="off" id="form_aprendiz"  method="POST">

    <div class="columns">
        <div class="column">
        <div class="control">
            <label class="label">Quien registra:</label>
            <input class="input" type="text" name="documento" value="<?= $_SESSION['usuario']['usuario_usuario']?>" disabled>
            <input type="hidden" name="usuario" value="<?= $_SESSION['usuario']['id_usuario']?>">
        </div>
        <?php echo isset($_SESSION['errores']) ? mostrarAlerta($_SESSION['errores'],'usuario'):"" ?>
    </div>
        <div class="column">
                <div class="control">
                    <label class="label">Titulada: <a class="tag is-success js-modal-trigger" id="modal-tituladas" data-target="modal_titu">Buscar</a></label>
                <?php
                if(isset($_POST['id_titulada'])){
                include('./php/mostrar_titulada.php');
                }else{
                    echo'
                    <input class="input" name="nom_titulada" type="text" value="" disabled>
                    <input type="hidden" name="titulada" >
                    </div>
                    </div>

                    <div class="column">
                    <div class="control">
                            <label class="label">Ficha titulada:</label>
                            <input class="input" type="text" value="" disabled>
                        </div>
                    </div>
                    ';
                }
    ?>
    </div>

    <div class="columns">
        <div class="column">
            <label for="tipoDoc" class="label">Tipo de Documento</label>
                <div class="control select">
                    <select name="tipodocumento">
                    <option value="">Seleccione una Opcion</option>
                    <option value="Cedula de Ciudadania">Cedula de Ciudadania</option>
                    <option value="TarjetaDeIdentidad">Tarjeta de Identidad</option>
                    <option value="CedulaExtranjera">Cedula Extranjera</option>
                    </select>
                </div>
        </div>
        <div class="column">
            <div class="control">
                <label class="label"># Documento</label>
                <input class="input" type="text" name="documento_aprendiz" pattern="[0-9]{3,20}" >
            </div>
            <?php echo isset($_SESSION['errores']) ? mostrarAlerta($_SESSION['errores'],'documento'):"" ?>
        </div>
        <div class="column">
        <div class="control">
            <label class="label">Nombres</label>
            <input class="input" type="text" name="nombre_aprendiz" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" placeholder="Nombre del aprendiz">
        </div>
        <?php echo isset($_SESSION['errores']) ? mostrarAlerta($_SESSION['errores'],'nombre'):"" ?>
    </div>     
    </div>

    <div class="columns">
        <div class="column">
                <div class="control">
                    <label class="label">Apellidos</label>
                    <input class="input" type="text" name="apellido_aprendiz" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" placeholder="Apellido del aprendiz">
                </div>
                <?php echo isset($_SESSION['errores']) ? mostrarAlerta($_SESSION['errores'],'apellido'):"" ?>
        </div>
        <div class="column">
            <div class="control">
                <label class="label">Correo</label>
                <input class="input" type="email" name="correo_aprendiz" pattern="[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]{6,40}" placeholder="Ingresa email">
            </div>
            <?php echo isset($_SESSION['errores']) ? mostrarAlerta($_SESSION['errores'],'correo'):"" ?>
        </div>
        <div class="column">
            <div class="control">
                <label class="label">Celular</label>
                <input class="input" type="text" name="cel_aprendiz" pattern="[0-9]{3,20}" placeholder="# Celular">
            </div>
            <?php echo isset($_SESSION['errores']) ? mostrarAlerta($_SESSION['errores'],'celular'):"" ?>
        </div>
    </div>

    <div class="columns column-art-cod">
        <div class="column">
            <div class="control">
                <label class="label">Articulos:</label>
                <div class="control select">
                    <select name="articulos">
                        <?php
                        $articulos = obtenerDatos($db,'articulos',null); 
                            while($articulo = mysqli_fetch_assoc($articulos)){
                                echo '<option value="'.$articulo['id_articulo'].'">'.$articulo['nombre_articulo'].' - '.$articulo['nombre_articulo_2'].'</option> ';
                            }
                        ?>
                    </select>
                </div>
            <?php echo isset($_SESSION['errores']) ? mostrarAlerta($_SESSION['errores'],'articulos'):"" ?>
            </div>
        </div>
            <div class="column">
            <div class="control">
                <label class="label">Codigo #1</label>
                <input class="input" type="text" name="codigo1" pattern="[0-9]{3,15}" placeholder="Ingrese numero de producto">
            </div>
            <?php echo isset($_SESSION['errores']) ? mostrarAlerta($_SESSION['errores'],'codigo1'):"" ?>
        </div>
        <div class="column">
            <div class="control">
                <label class="label">Descripcion 1</label>
                <textarea name="descripcion1"></textarea>
            </div>
            <?php echo isset($_SESSION['errores']) ? mostrarAlerta($_SESSION['errores'],'descripcion1'):"" ?>
        </div>
    </div>
    <div class="columns column-art-cod">
        <div class="column">
            <div class="control">
                <label class="label">Codigo #2</label>
                <input class="input" type="text" name="codigo2" pattern="[0-9]{3,15}" placeholder="Ingrese numero de producto">
            </div>
            <?php echo isset($_SESSION['errores']) ? mostrarAlerta($_SESSION['errores'],'codigo2'):"" ?>
        </div>
        <div class="column">
            <div class="control">
                <label class="label">Descripcion 2</label>
                <textarea  name="descripcion2"></textarea>
            </div>
            <?php echo isset($_SESSION['errores']) ? mostrarAlerta($_SESSION['errores'],'descripcion2'):"" ?>
        </div>
    </div>

        <div class="box-button">
            <button class="my-button button-clr-verde" type="submit" value="Registrar"><img src="./images/save.png" alt="" class="mr-2">Registrar</button>
        </div>

</form>    
<?php BorrarErrores(); ?>

<!-- ### SECCION PARA BUSCAR TITULADAS ### -->
<div class="modal" id="modal_titu">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Buscar titulada</p>
            <button class="delete" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
            <!-- contenido del modal -->

                <div class="is-flex is-flex-direction-column">
                    <label for="buscar_titulada" class="label mr-4">Introduce nombre o # de ficha:</label>
                    <input type="text" class="input mb-4" id="texto-busqueda">
                </div>

                <div id="resultado-busqueda" class="mb-3"></div> 
            <form action="" method="POST" autocomplete="off" id="miFormulario">
                <input type="hidden" value="" name="id_titulada" id="mostrarInput">
                <button type="submit" class="button is-success title is-6" id="guardarBtn">Seleccionar</button>
        </form>
        </section>
    </div>
</div>
<!-- SE ACABA LA SECCION DEL MODAL -->


<script src="./js/funcion_select_tituladas.js"></script>
<script src="./js/modal.js"></script>
<script src="./js/val_form_registro_aprendiz.js"></script>
