<article class="panel-heading"> 
    <h3>
        Nuevo usuario
    </h3>
    <p class="">
        Completa el formulario para registrar el nuevo usuario
    </p>     
</article>


    <ul class="ul-mini-nav" >
        <li class="is-active">
            <a href="index.php?vista=usuario_nuevo">
                <span>AGREGAR</span>
            </a>
        </li>

        <li >
            <a href="index.php?vista=usuarios_lista">
                <span>LISTA USUARIOS</span>
            </a>
        </li>

        <li >
            <a href="index.php?vista=usuario_search">
                <span>BUSCAR</span>
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
    


<form action="./php/guardar_usuario.php" class="box" autocomplete="off" id="registro-for"  method="POST">

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
                <label class="label">Documento de Identidad</label>
                <input class="input" type="text" name="documento" pattern="[0-9]{3,20}" placeholder="Ingresa tu numero de documento">
            </div>
            <?php echo isset($_SESSION['errores']) ? mostrarAlerta($_SESSION['errores'],'documento'):"" ?>
        </div>
        <div class="column">
            <div class="control">
                <label class="label">Nombres</label>
                <input class="input" type="text" name="nombres" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" placeholder="Escribe tu nombre">
            </div>
            <?php echo isset($_SESSION['errores']) ? mostrarAlerta($_SESSION['errores'],'nombres'):"" ?>
        </div>
    </div>

    <div class="columns">
        <div class="column">
                <div class="control">
                    <label class="label">Apellidos</label>
                    <input class="input" type="text" name="apellidos" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" placeholder="Escribe tus apellidos">
                </div>
                <?php echo isset($_SESSION['errores']) ? mostrarAlerta($_SESSION['errores'],'apellidos'):"" ?>
            </div>
            <div class="column">
                <div class="control">
                    <label class="label">Email</label>
                    <input class="input" type="email" name="email" pattern="[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" placeholder="Ingresa tu correo">
                </div>
                <?php echo isset($_SESSION['errores']) ? mostrarAlerta($_SESSION['errores'],'correo'):"" ?>
            </div>
            <div class="column">
                <div class="control">
                    <label class="label">Usuario</label>
                    <input class="input" type="text" name="usuario" pattern="[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]{6,40}" placeholder="Define tu usuario">
                </div>
                <?php echo isset($_SESSION['errores']) ? mostrarAlerta($_SESSION['errores'],'usuario'):"" ?>
            </div>
    </div>
    
    <div class="columns">
        <div class="column">
                <div class="control">
                    <label class="label">Contraseña</label>
                    <input class="input" type="password" name="clave_1" pattern="[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]{6,80}" placeholder="Ingresa tu contraseña">
                </div>
                <?php echo isset($_SESSION['errores']) ? mostrarAlerta($_SESSION['errores'],'contraseña'):"" ?>
            </div>
            <div class="column">
                <div class="control">
                    <label class="label">Confirmar Contraseña</label>
                    <input class="input" type="password" name="clave_2" pattern="[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]{6,80}" placeholder="Confirma tu contraseña">
                </div>
            </div>
            <div class="column">
            <label for="rol" class="label">Rol</label>
                <div class="control select ">
                    <select name="tiporol">
                    <option value="">seleccione una opcion</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Celador">Celador</option>
                    </select>
                </div>
            </div>
    </div>
        <div class="my-center-gap">
            <button class="my-button button-clr-verde" type="submit" value="Registrar"><img src="./images/iconos/save-icon-b.svg" class="icon">Registrar</button>
        </div>

</form>    
<?php BorrarErrores(); ?>


<script src="./js/validar-form-registro.js"></script>