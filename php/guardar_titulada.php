<?php 

require_once('./main.php');
require_once('./conexion.php');

$nombreTitulada = limpiar_cadena($_POST['nombre_titulada']);
$ficha = limpiar_cadena($_POST['ficha']);
$jornada = limpiar_cadena($_POST['jornada']);

$errores = array();

if(empty($nombreTitulada) || verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}",$nombreTitulada)){
    $errores['nombreTitulada']= "El nombre de la titulada no puede quedar vacio";
}else{
    $nombreTitulada = ucwords(strtolower($nombreTitulada));
}

if(empty($ficha) || verificar_datos("[0-9]{3,10}",$ficha)){
    $errores['ficha']= "El numero de ficha debe estar definido!";
}


if(count($errores) == 0){

$sql_check = "SELECT * FROM tituladas WHERE ficha_titulada = $ficha;";
$check = mysqli_query($db, $sql_check);

    if($check && mysqli_num_rows($check)==1){
        $_SESSION['fichaExiste'] = "
                <div class='message is-danger title is-5 m-0'>
                    <div class='message-header'>
                        <p>Error de registro!</p>
                    </div>
                    <div class='message-body is-size-6'>
                        El numero de ficha:<strong>$ficha</strong> ya se encuentra registrado!.
                    </div>
                </div>"; 

                header('location:../index.php?vista=tituladas_lista');
    }else{
        $sql = "INSERT INTO tituladas VALUES (null,'$nombreTitulada',$ficha,'$jornada');";
        $guardar = mysqli_query($db, $sql);

        if($guardar){

            $_SESSION['titulada'] = "
                <div class='message title is-5 m-0'>
                    <div class='message-header'>
                        <p>Registro Exitoso!</p>
                    </div>
                    <div class='message-body is-size-6'>
                        La titulada <strong>$nombreTitulada</strong> se registro correctamente!.
                    </div>
                </div>"; 

                header('location:../index.php?vista=tituladas_lista');
        }else{
            $_SESSION['titulada-error'] = "
                <div class='message is-danger title is-5 m-0'>
                    <div class='message-header'>
                        <p>Error de registro!</p>
                    </div>
                    <div class='message-body is-size-6'>
                        La titulada <strong>$nombreTitulada</strong> no se ha podido registrar comuniquese con soporte!.
                    </div>
                </div>"; 

                header('location:../index.php?vista=tituladas_lista');
        }
    }


    
}else{
    $_SESSION['errores'] = $errores;
}

mysqli_close($db);
header('location:../index.php?vista=tituladas_lista');

?>