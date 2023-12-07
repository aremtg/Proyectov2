<?php require_once('./php/main.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">

    <link rel="stylesheet" href="./css/login.css">
</head>
<body>

        <?php if(isset($_SESSION['errorPassword'])): ?>
            <div class='message'>
                <?= $_SESSION['errorPassword'];?>
            </div>
        <?php elseif (isset($_SESSION['usuarioNoExiste'])):?>
            <div class='message'>
                <?= $_SESSION['usuarioNoExiste'];?>
            </div>
        <?php endif;  ?>

    <div class="box-login">
       

        <form action="" method="POST" autocomplete="off" id="form-login">
            <div class="logos-login">
        <h1 class="saci">SSACI</h1><span class="separa_logos"></span><img class="logoSena" src="images/logoSena.svg" alt="">
        </div>
            <div class="control-login">
                <label for="input-login-usuario"><img src="images/person-icon.svg" alt=""></label>
                <input class="input-form" id="input-login-usuario" type="text" placeholder="Usuario" name="login_usuario" >
            </div>

            <div class="control-login">
                <label for="input-login-contrasena"><img src="images/candado-icon.svg" alt=""></label>
                <input class="input-form" id="input-login-contrasena" type="password" placeholder="Contraseña" name="login_clave">
            </div>
            <button type="submit" class="my-button btn-ingresar">Ingresar</button>
        </form>
        <?php BorrarErrores(); ?>

        <?php if(isset($_POST['login_usuario']) && isset($_POST['login_clave'])){
            require_once('./php/main.php');
            require_once('./php/iniciar_sesion.php');
        } ?>
    </div>
</body>
<script src="./js/validar-form-login.js"></script>
</html>