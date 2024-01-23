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

       

    <div class="box-login">
 <?php if(isset($_SESSION['errorPassword'])): ?>
            <div class='message is-danger'>
                <?= $_SESSION['errorPassword'];?>
            </div>
        <?php elseif (isset($_SESSION['usuarioNoExiste'])):?>
            <div class='message is-danger'>
                <?= $_SESSION['usuarioNoExiste'];?>
            </div>
        <?php endif;  ?>
        <form action="" method="POST" autocomplete="off" id="form-login">
            <div class="logos-login">
        <img class="logoSena" src="images/logoSena.svg" alt=""><span class="separa_logos"></span><h1 class="saci">SSACI</h1>
        </div>
        <div class="field">
    <div class="control has-icons-left">
        <input class="input" id="input-login-usuario" type="text" placeholder="Usuario" name="login_usuario">
        <span class="icon is-small is-left">
            <img src="images/person-icon.svg" alt="">
        </span>
    </div>
</div>

<div class="field">
    <div class="control has-icons-left">
        <input class="input" id="input-login-contrasena" type="password" placeholder="Contraseña" name="login_clave">
        <span class="icon is-small is-left">
            <img src="images/candado-icon.svg" alt="">
        </span>
    </div>
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