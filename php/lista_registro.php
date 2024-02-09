<?php 

    $inicio = ($pagina > 0) ? (($pagina * $registros)-$registros) : 0; // esta funcion es para saber donde iniciar la tabla
    $tabla = "";       

        $consulta_datos = "SELECT r.*,
        a.id_aprendiz,
        CONCAT(a.nombre_aprendiz,' ',a.apellido_aprendiz) AS 'nombre completo',
        a.serial_articulo_1,
        a.descrpcion_articulo_1,
        a.serial_articulo_2,
        a.descrpcion_articulo_2,
        art.nombre_articulo,
        art.nombre_articulo_2
        FROM registro r 
        INNER JOIN aprendices a ON a.id_aprendiz = r.id_aprendiz
        INNER JOIN articulos art ON art.id_articulo = a.id_articulo
        ORDER BY a.nombre_aprendiz ASC LIMIT $inicio,$registros;";

        $consulta_total = "SELECT COUNT(id_registro) FROM registro;";

    $datos = mysqli_query($db, $consulta_datos);
    $datos = mysqli_fetch_all($datos, MYSQLI_ASSOC);


    $total = mysqli_query($db, $consulta_total);
    $total = mysqli_fetch_array($total);
    $total = (int)$total[0];
    

    $Npaginas = ceil($total/$registros);

    $tabla.='
        <div class="table-container">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr class="has-text-centered">
                    <th class="has-text-centered">#</th>
                    <th class="has-text-centered">Nombre aprendiz</th>
                    <th class="has-text-centered">Articulo 1</th>
                    <th class="has-text-centered">Serial</th>
                    <th class="has-text-centered">Descripcion</th>
                    <th class="has-text-centered">Articulo 2</th>
                    <th class="has-text-centered">Serial</th>
                    <th class="has-text-centered">Descripcion</th>
                    <th class="has-text-centered">Fecha</th>
                    <th class="has-text-centered">Hora</th>
                    <th class="has-text-centered">Opciones</th>
                </tr>
            </thead>
            <tbody>

        ';

    if($total>=1 && $pagina<=$Npaginas){
        $contador=$inicio+1; // esta varibale llevar la numeracion en la tabla 
        $pag_inicio=$inicio+1; // variable para saber en que pocision de la pagina inicial estamos mostrado en el texto "mostrando usuarios"

        foreach($datos as $rows){
            $tabla.='
                <tr class="has-text-centered" >
                <td>'.$contador.'</td>
                <td>'.$rows['nombre completo'].'</td>
                <td>'.$rows['nombre_articulo'].'</td>
                <td>'.$rows['serial_articulo_1'].'</td>
                <td>'.$rows['descrpcion_articulo_1'].'</td>
                <td>'.$rows['nombre_articulo_2'].'</td>
                <td>'.$rows['serial_articulo_2'].'</td>
                <td>'.$rows['descrpcion_articulo_2'].'</td>
                <td>'.$rows['fecha_registro'].'</td>
                <td>'.$rows['hora_registro'].'</td>
                <td>
                    <a href="./php/delete.php?id='.$rows['id_registro'].'" class="my-button button is-danger is-rounded is-small">
                    <img src="./images/iconos/basura-icon-b.svg" class="icon">Eliminar</a>
                </td>
                </tr>
            ';
            $contador++;
        }
        
        $pag_final=$contador-1; //variable para saber en que pocision de la pagina final estamos mostrado en el texto "mostrando usuarios"
        
    }else{

        if($total>=1){
            $tabla.='
            <tr class="has-text-centered" >
            <td colspan="9">
                <a href="'.$url.'1" class="button is-link is-rounded is-small mt-4 mb-4">
                    Haga clic acá para recargar el listado
                </a>
            </td>
            </tr>
            ';
    
        }else{
            $tabla.='
            <tr class="has-text-centered" >
            <td colspan="12">
                No hay registros en el sistema!
            </td>
            </tr>
            ';
        }
    
    
    }
    mysqli_close($db);
    $tabla.=' </tbody></table></div>';

    

    if($total>=1 && $pagina <= $Npaginas){
        $tabla.='
        <p class="has-text-right">Mostrando usuarios <strong>'.$pag_inicio.'</strong> al <strong>'.$pag_final.'</strong> de un <strong>total de '.$total.'</strong></p>
        ';
    }



    echo $tabla;

    if($total>=1 && $pagina <= $Npaginas){
        echo paginador_tablas($pagina,$Npaginas,$url,3); //funcion ya definida en el archivo main.php
    }