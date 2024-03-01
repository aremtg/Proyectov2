<?php $datos_user = actualizarDatos($_SESSION['usuario'], $db);
if (!empty($datos_user)) :
    while ($datos = mysqli_fetch_assoc($datos_user)) :
?>
        <article class="panel-heading mb-5">
            <h3 class="">
                INFORMACION PERSONAL
            </h3>
            <p class="">
                <?= $datos['nombre_usuario']; ?> Aqui puedes ver o editar tu perfil.
            </p>
        </article>
        <?php if (isset($_SESSION['guardar'])) : ?>

            <div class='message is-success'>
                <?= $_SESSION['guardar']; ?>
            </div>

        <?php elseif (isset($_SESSION['error-clave'])) : ?>
            <div class='message is-danger '>
                <?= $_SESSION['error-clave']; ?>
            </div>
        <?php elseif (isset($_SESSION['errorClave'])) : ?>
            <div class='message is-danger '>
                <?= $_SESSION['errorClave']; ?>
            </div>
        <?php endif; ?>

        <div class="mb-3">
            <?php echo isset($_SESSION['errores']) ? mostrarAlerta($_SESSION['errores'], 'pass') : ""; ?>
            <?php echo isset($_SESSION['errores']) ? mostrarAlerta($_SESSION['errores'], 'nombres') : ""; ?>
            <?php echo isset($_SESSION['errores']) ? mostrarAlerta($_SESSION['errores'], 'apellidos') : ""; ?>
            <?php echo isset($_SESSION['errores']) ? mostrarAlerta($_SESSION['errores'], 'documento') : ""; ?>
            <?php echo isset($_SESSION['errores']) ? mostrarAlerta($_SESSION['errores'], 'correo') : ""; ?>
            <?php echo isset($_SESSION['errores']) ? mostrarAlerta($_SESSION['errores'], 'contraseña') : ""; ?>
        </div>



        <div class="div-info-perfil">
            <div class="info-foto-perfil">
                <img class="img_user" src="./images/user.png" alt="Foto de perfil">
            </div>
            <div class="info-perfil">
                <div class="columns">
                    <div class="column">
                        <div class="control">
                            <h3 class="">Nombres</h3>
                            <p class=""><?= $datos['nombre_usuario']; ?></p>
                        </div>
                    </div>

                    <div class="column">
                        <div class="control">
                            <h3 class="">Apellidos</h3>
                            <p class=""><?= $datos['apellido_usuario']; ?></p>
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="control">
                            <h3 class="">Tipo de Documento</h3>
                            <p class=""><?= $datos['tipoDoc_usuario']; ?></p>
                        </div>
                    </div>

                    <div class="column">
                        <div class="control">
                            <h3 class="">N° Documento </h3>
                            <p class=""><?= $datos['documento_usuario']; ?></p>
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="control">
                            <h3 class="">Correo</h3>
                            <p class=""><?= $datos['correo_usuario']; ?></p>
                        </div>
                    </div>

                    <div class="column">
                        <div class="control">
                            <h3 class="">Usuario</h3>
                            <p class=""><?= $datos['usuario_usuario']; ?></p>
                        </div>
                    </div>
                </div>
                <div class="my-center-gap">
                    <button type="submit" class="my-button button-clr-verde js-modal-trigger" data-target="modal_update_perfil">
                        <img src="./images/iconos/editar-icon-b.svg" class="icon">Editar</button>
                    <button type="submit" class="my-button button-clr-rojo js-modal-trigger" data-target="modal_del_perfil">
                        <img src="./images/iconos/basura-icon-b.svg" class="icon">Eliminar</button>
                </div>
            </div>
        </div>

        <!-- ESTE ES EL MODAL PARA LA ACTUALIZACION DEL PERFIL VA UNIDO AL BOTON EDITAR PERFIL -->
        <div class="modal" id="modal_update_perfil">
            <div class="modal-background"></div>
            <div class="modal-card" id="modal-card">
                <header class="modal-card-head">
                    <h3 class="modal-card-title my-center-gap">
                    <img src="./images/iconos/editar-icon.svg" class="icon">Editar Perfil</h3>
                    <button class="delete" aria-label="close"></button>
                </header>
                <section class="modal-card-body">
                    <!-- Contenido del modal-->
                    <form action="./php/update_perfil.php" class="box-modal" autocomplete="off" id="perfil_up_form" method="POST">

                        <div class="columns-con-dos-column">
                            <div class="column">
                                <label for="tipoDoc" class="label">Tipo de Documento</label>
                                <div class="control select">
                                    <select name="tipodocumento" value="">
                                        <option value="<?= $datos['tipoDoc_usuario']; ?>"><?= $datos['tipoDoc_usuario']; ?></option>
                                        <option value="Cedula de Ciudadania">Cedula de Ciudadania</option>
                                        <option value="TarjetaDeIdentidad">Tarjeta de Identidad</option>
                                        <option value="CedulaExtranjera">Cedula Extranjera</option>
                                    </select>
                                </div>
                            </div>

                            <div class="column">
                                <div class="control">
                                    <label class="label">N° Documento</label>
                                    <input class="input" type="text" name="documento" pattern="[0-9]{3,20}" value="<?= $datos['documento_usuario']; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="columns-con-dos-column">
                            <div class="column">
                                    <div class="control">
                                        <label class="label">Nombres</label>
                                        <input class="input" type="text" name="nombres" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" value="<?= $datos['nombre_usuario']; ?>">
                                    </div>
                            </div>
                            <div class="column">
                                <div class="control">
                                    <label class="label">Apellidos</label>
                                    <input class="input" type="text" name="apellidos" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" value="<?= $datos['apellido_usuario']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="columns-con-dos-column">
                            <div class="column">
                                    <div class="control">
                                        <label class="label">Correo</label>
                                        <input class="input" type="email" name="email" pattern="[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" value="<?= $datos['correo_usuario']; ?>">
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="control">
                                        <label class="label">Usuario</label>
                                        <input class="input" type="text" name="usuario" pattern="[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]{6,40}" value="<?= $datos['usuario_usuario']; ?>" disabled>
                                    </div>
                                </div>
                        </div>       

                        <div class="columns column-contraseñas-rol">
                            <div class="column">
                                <div class="control">
                                    <label class="label">Contraseña</label>
                                    <input class="input" type="password" name="clave_user" pattern="[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]{6,80}" placeholder="Ingresa tu contraseña">
                                </div>
                            </div>
                            <div class="column">
                                <div class="control">
                                    <label class="label"><input type="checkbox" class="checkbox" id="check_up_pass"> Cambiar Contraseña</label>
                                    <input class="input" type="password" name="clave_new" pattern="[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]{6,80}" id="clave_cambiada" disabled>
                                </div>
                            </div>
                           
                            <div class="column">
                                <label for="rol" class="label">Rol</label>
                                <div class="control select ">
                                    <select name="tiporol">
                                        <option value="<?= $datos['rol_usuario']; ?>"><?= $datos['rol_usuario']; ?></option>
                                        <option value="Administrador">Administrador</option>
                                        <option value="Celador">Celador</option>
                                    </select>
                                </div> 
                            </div>
                        </div> <footer class="my-center-gap">
                               <button type="submit" class="my-button button-clr-azul"><img src="./images/iconos/save-icon-b.svg" class="icon">Guardar Cambios</button>
                            </footer>
                    </form>
                </section>
            </div>
            <!-- se acaba el contenido del modal -->
        </div>
        <!-- SE ACABA LA SECCION DEL MODAL -->

        <!-- ####### ESTE ES EL MODAL PARA ELIMINAR EL PERFIL VA UNIDO AL BOTON ELIMINAR ####### -->
        <div class="modal" id="modal_del_perfil">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <h3 class="modal-card-title my-center-gap">
                    <img src="./images/iconos/basura-icon.svg" class="icon">Eliminar Usuario</h3>
                    <button class="delete" aria-label="close"></button>
                </header>
                <section class="modal-card-body">
                    <!-- Contenido del modal-->

                    <div class="modal-advertencia">
                        <strong class="has-text-danger">Advertencia!</strong> El usuario con la cuenta se elimanaran de forma permanente!
                    </div>
                    <form action="./php/delete_user.php" class="box-modal" method="POST" autocomplete="off" id="form_delete">
                        <div class="columns">
                            <label for="usuario_del" class="label">Usuario:</label>
                            <input type="text" class="input" value="<?= $datos['usuario_usuario']; ?>" disabled>
                            <input type="hidden" name="usuario_del" value="<?= $datos['usuario_usuario']; ?>">
                        </div>

                        <div class="columns">
                            <label for="confir_clave" class="label">Confirmar Contraseña</label>
                            <input type="password" name="confirm_clave" class="input" id="confirm_pass" disabled>
                        </div>

                        <div class="checkbox">
                            <input type="checkbox" name="delete" id="check_confirm">
                            <label for="delete" class="has-text-danger">Al eliminar la cuenta se borraran los aprendices registrados!</label>
                        </div>
                        <footer class="my-center-gap">
                            <button type="submit" class="my-button button-clr-rojo"><img src="./images/iconos/basura-icon-b.svg" class="icon">Eliminar</button>
                        </footer>
                    </form>
                    <!-- se acaba el contenido del modal -->
                </section>
            </div>
        </div>
</div>
        <!-- SE ACABA LA SECCION DEL MODAL -->

<?php endwhile;
endif;
?>
<?php BorrarErrores(); ?>
<script src="./js/validar_update_perfil.js"></script>
<script src="./js/modal.js"></script>