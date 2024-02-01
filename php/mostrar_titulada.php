<?php 

$idTitulada = limpiar_cadena($_POST['id_titulada']);


if(!empty($idTitulada)){

$sql = "SELECT * FROM tituladas WHERE id_titulada = $idTitulada;";
$guardar = mysqli_query($db, $sql);

$datos = mysqli_fetch_all($guardar, MYSQLI_ASSOC);
    foreach($datos as $dato){
        // ntitulada es para usarlo en envio del nombre de la titulada a la tabla instructores--permisos
        echo'  <input class="input" type="text" value="'.$dato['nombre_titulada'].'"disabled>
        <input type="hidden" name="titulada" value="'.$dato['id_titulada'].'">
        <input type="hidden" class="input" name="ntitulada" value="'.$dato['nombre_titulada'].'" >
    </div>';
    echo isset($_SESSION['errores']) ? mostrarAlerta($_SESSION['errores'],'titulada'):"";
    echo'
    </div>

    <div class="column">
    <div class="control">
            <label class="label">Ficha titulada:</label>
            <input class="input" type="text" value="'.$dato['ficha_titulada'].'" disabled>
            <input type="hidden" name="ficha" value="'.$dato['ficha_titulada'].'" >
        </div>
    </div>
    ';
    }

}else{
    echo '
        <input class="input" type="text" value="No seleccionaste ninguna titulada" disabled>
        </div>
    </div>
    <div class="column">
    <div class="control">
            <label class="label">Ficha titulada:</label>
            <input class="input" type="text" value="Indefinida" disabled>
        </div>
    </div>
    ';
}   

?>