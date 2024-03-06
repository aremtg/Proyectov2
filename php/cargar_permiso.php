<?php 
    require_once('conexion.php');
    require_once('main.php');

    $usuario = $_POST['usuario']; $nombreUsuario = $_POST['nombreUsuario'];
    $apellidoUsuario = $_POST['apellidoUsuario'];
    $hora_permiso = $_POST['hora_permiso'];
    $fecha_permiso = $_POST['fecha_permiso'];
    $nombre_instructor_permiso = limpiar_cadena($_POST['nombre_instructor_permiso']);
    $nombre_aprendiz_permiso = limpiar_cadena($_POST['nombre_aprendiz_permiso']);
    $titulada_permiso = limpiar_cadena($_POST['titulada_permiso']);
    $ficha_permiso = limpiar_cadena($_POST['ficha_permiso']); 
    $ambiente_permiso = limpiar_cadena($_POST['ambiente_permiso']);
    $motivo_permiso = limpiar_cadena($_POST['motivo_permiso']);
    $errores = array();
    if (empty($usuario) || empty($nombreUsuario) || empty($apellidoUsuario) || empty($hora_permiso) || empty($fecha_permiso) || empty($nombre_instructor_permiso) || empty($nombre_aprendiz_permiso) || empty($titulada_permiso) || empty($ficha_permiso) || empty($ambiente_permiso) || empty($motivo_permiso)) {
        $errores["envioDatos"] = "
        
        Hubo un error al recibir datos, intetalo de nuevo.";
        } else {

            
            $sql = "INSERT INTO permisosdata (
                id,
                usuario,
                nombreUsuario,
                apellidoUsuario,
                hora_permiso,
                fecha_permiso,
                nombre_instructor_permiso, 
                nombre_aprendiz_permiso,
                titulada_permiso,
                ficha_permiso,
                ambiente_permiso,
                motivo_permiso,
                creado
                ) VALUES (
                    null,
                    '$usuario',
                    '$nombreUsuario',
                    '$apellidoUsuario',
                    '$hora_permiso',
                    '$fecha_permiso',
                    '$nombre_instructor_permiso',
                    '$nombre_aprendiz_permiso',
                    '$titulada_permiso',
                    '$ficha_permiso',
                    '$ambiente_permiso',
                    '$motivo_permiso',
                    now()
                )";


                $guardar = mysqli_query($db, $sql);
                
                $from = $_POST['emailUsuario'];
                $to = 'ssacisena@gmail.com';
                $mensaje = "Permiso concedido.
                Instructor: $nombre_instructor_permiso,
                Aprendiz: $nombre_aprendiz_permiso,
                titulada: $titulada_permiso,
                ficha: $ficha_permiso,
                el dia: $fecha_permiso,
                a la hora: $hora_permiso,
                Motivo de la salida: $motivo_permiso.";    

                $asunto = "Permiso de salida: $nombre_instructor_permiso";
                $cabeceras = "From: $from\r\n";
                $cabeceras .= "Reply-To: $from\r\n";
                $cabeceras .= "X-Mailer: PHP/" . phpversion();
                    
                if ($guardar) {
                    $_SESSION['guardar'] = "
                    <div class='message-header title is-5 m-0'>
                        <p>Permiso enviado a la aplicacion!</p>
                    </div>
                    <div class='message-body is-size-6'>
                        El permiso se ha enviado <strong>CORRECTAMENTE</strong>.
                    </div>";
                
                    if (mail($to, $asunto, $mensaje, $cabeceras)) {
                        // Si el envío de correo electrónico es exitoso, mostrar un mensaje de éxito
                        $_SESSION['guardar'] = "
                            <div class='message-header title is-5 m-0'>
                                <p>Permiso enviado!</p>
                            </div>
                            <div class='message-body is-size-6'>
                                El permiso se ha enviado <strong>CORRECTAMENTE</strong>.
                            </div>";
                    } else {
                        // Si hay un error al enviar el correo electrónico, mostrar un mensaje de error
                        $errores["envioPermiso"] =  "Error al enviar el correo electrónico: " . error_get_last()['message'];
                    }
                } else {
                    // Si hay un error al guardar en la base de datos, mostrar un mensaje de error y redirigir al usuario
                    $errores["envioPermiso"] = "Hubo un error al guardar el permiso en la base de datos.";
                    mysqli_close($db);
                    header('location:../index.php?vista=crear_permisos');
                }
                
            }
            $_SESSION['errores']= $errores;
            mysqli_close($db);
            header('location:../index.php?vista=crear_permisos');
?> 