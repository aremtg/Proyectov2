<?php 

$idTitulada = limpiar_cadena($_POST['id_titulada']);


if(!empty($idTitulada)){

$sql = "SELECT * FROM tituladas WHERE id_titulada = $idTitulada;";
$guardar = mysqli_query($db, $sql);

$datos = mysqli_fetch_all($guardar, MYSQLI_ASSOC);
    foreach($datos as $dato){
        echo' <input class="input" name="nombre_titulada" type="text" value="'.$dato['nombre_titulada'].'" >
        <input type="hidden" name="titulada" value="'.$dato['id_titulada'].'">
    </div>';
    echo isset($_SESSION['errores']) ? mostrarAlerta($_SESSION['errores'],'titulada'):"";
    echo'
    </div>

    <div class="column">
    <div class="control">
            <label class="label">Ficha titulada:</label>
            <input class="input" type="text" value="'.$dato['ficha_titulada'].'" disabled>
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