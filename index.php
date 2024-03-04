<?php 
require_once('./php/conexion.php'); 
require_once('./php/helper.php'); 
require_once('./includes/header.php');

// Verifica si la vista no está definida o está vacía, luego establece la vista como 'login'
if (!isset($_GET['vista']) || $_GET['vista'] == "") {
    $_GET['vista'] = 'login';
}

// Comprueba si el archivo de la vista existe y si no es la página de login, luego muestra la vista
if (is_file('./views/'.$_GET['vista'].'.php') && $_GET['vista'] != 'login') {
    require_once('./php/main.php'); 
    include('./views/navbar.php');
    include('./views/'.$_GET['vista'].'.php');
    include('./includes/script.php');
    include('./includes/spiner.php');


} else {
    if ($_GET['vista'] == 'login') {
        include('views/login.php');
    } else {
        include('views/404error.php');
    }
}

// Muestra el footer solo si la vista no es la página de inicio de sesión
if ($_GET['vista'] != 'login' && $_GET['vista'] != '404error' ) {
    if (is_file('./views/'.$_GET['vista'].'.php')) {
    ?>  
    </div>
<?php
    include('./includes/footer.php');
?>
<?php
    }
}
?>
</body>
</html>
