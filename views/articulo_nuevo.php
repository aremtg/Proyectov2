<article class="panel-heading"> 
    <h3 class="" >ARTICULOS</h3>
    <p class="">
        Articulos registrados!
    </p>     
</article>
    <ul class="ul-mini-nav">
        <li class="is-active">
            <a href="index.php?vista=articulo_nuevo">
                <span>AGREGAR</span>
            </a>
        </li>

        <li>
            <a href="index.php?vista=articulos">
                <span>LISTA ARTICULOS</span>
            </a>
        </li>

    </ul>

    <?php if(isset($_SESSION['registrado'] )): ?>

        <div class='message is-success'>
        <?= $_SESSION['registrado'] ; ?>
        </div>

    <?php elseif (isset($_SESSION['errorRegistro'])):?>
        <div class='message is-danger '>
        <?= $_SESSION['errorRegistro'] ; ?>
        </div>
    <?php endif; ?>
    


<form action="./php/guardar_articulo.php" class="box-form" autocomplete="off" method="POST">

    <div class="columns">
        <div class="column">
            <div class="control">
                <label class="label">Nombre Articulo:</label>
                <input class="input" type="text" name="articulo" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" placeholder="Define tu articulo">
            </div>
            <?php echo isset($_SESSION['errores']) ? mostrarAlerta($_SESSION['errores'],'articulo'):"" ?>
        </div>
        <div class="column">
            <div class="control">
                <label class="label">Nombre Articulo 2:</label>
                <input class="input" type="text" name="articulo2" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" placeholder="Define tu articulo">
            </div>
            <?php echo isset($_SESSION['errores']) ? mostrarAlerta($_SESSION['errores'],'nombres'):"" ?>
        </div>
    </div>
        <footer class="box-button">
            <button class="my-button button-clr-verde" type="submit" value="Registrar"><img src="./images/save.png" alt="" class="mr-2">Registrar</button>
        </footer>

</form>    
<?php BorrarErrores(); ?>


<script src="./js/validar-form-registro.js"></script>