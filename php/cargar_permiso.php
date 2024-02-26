<?php 
require_once('conexion.php');
require_once('main.php');

    // Recoger datos del formulario
    $usuario = $_POST['usuario'];
    $nombreUsuario = $_POST['nombreUsuario'];
    $apellidoUsuario = $_POST['apellidoUsuario'];
    $hora_permiso = $_POST['hora_permiso'];
    $fecha_permiso = $_POST['fecha_permiso'];  
    $nombre_instructor_permiso = limpiar_cadena($_POST['nombre_instructor_permiso']);
    $nombre_aprendiz_permiso = limpiar_cadena($_POST['nombre_aprendiz_permiso']);
    $titulada_permiso = limpiar_cadena($_POST['titulada_permiso']);
    $ficha_permiso = limpiar_cadena($_POST['ficha_permiso']); 
    $ambiente_permiso = limpiar_cadena($_POST['ambiente_permiso']);
    $motivo_permiso = limpiar_cadena($_POST['motivo_permiso']);
    if (empty($usuario) || empty($nombreUsuario) || empty($apellidoUsuario) || empty($hora_permiso) || empty($fecha_permiso) || empty($nombre_instructor_permiso) || empty($nombre_aprendiz_permiso) || empty($titulada_permiso) || empty($ficha_permiso) || empty($ambiente_permiso) || empty($motivo_permiso)) {
        echo "<div class='message-header title is-5 m-0'>
        <p>Error!</p>
      </div>
      <div class='message-body is-size-6'>
        Por favor, completa todos los campos antes de continuar.
      </div>";
    } else {
            // Insertar en la base de datos
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
                $mensaje = 
                "Permiso para el aprendiz: $nombre_aprendiz_permiso,
                titulada: $titulada_permiso,
                ficha: $ficha_permiso,
                el dia: $fecha_permiso,
                a la hora: $hora_permiso. Motivo: $motivo_permiso.";

                $asunto = "¡Permiso de salida: $nombre_instructor_permiso !";
                $cabeceras = "From: $from\r\n";
                $cabeceras .= "Reply-To: $from\r\n";
                $cabeceras .= "X-Mailer: PHP/" . phpversion();
               
                // Enviar correo electrónico
                if(mail($to, $asunto, $mensaje, $cabeceras)) {
                    echo "Correo electrónico enviado correctamente";
                } else {
                    echo "Error al enviar el correo electrónico.";
                   
                }
            if($guardar){
                echo "Archivo Subido Correctamente";
                } else {
                    mysqli_close($db);
                    header('location:../index.php?vista=crear_permisos');
                } 

            mysqli_close($db);
            header('location:../index.php?vista=crear_permisos');
        }
       
        
?>
<!--  echo "Error al enviar el correo electrónico: " . error_get_last()['message']; // Muestra el error
                    exit(); // Detiene la ejecución del script -->