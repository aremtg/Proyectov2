
<div>
<h1 class='panel-heading'>Agregar instructor</h1>
    <form action="./php/guardarDatosPermisos.php" class="box" method="POST">
        <label for="nombreInstructor">Nombre del Instructor:</label>
        <input type="text" id="nombreInstructor" name="nombre_instructor" required><br><br>

        <label for="contacto">contacto:</label>
        <input type="text" id="contacto" class="input-form" name="contacto" placeholder="contacto" required><br><br>

        <div class="box-button">
            <input type="submit" class="my-button button-clr-azul" value="Guardar">
        </div>
    </form>
</div>
<div>
 <h1 class='panel-heading'>Agregar aprendiz a un instructor</h1>
<form action="./php/guardarDatosPermisos.php" method="POST" class='box'>
    <?php
        $sql = "SELECT id_instructor, nombre FROM instructores";
        $resultado = $db->query($sql);
        if ($resultado->num_rows > 0) {
            echo '<label for="instructor">Seleccionar Instructor:</label>';
            echo '<select name="instructor" id="instructor">';
            while ($fila = $resultado->fetch_assoc()) {
                echo '<option value="' . $fila['id_instructor'] . '">' . $fila['nombre'] . '</option>';
            }
            echo '</select>';
        } else {
            echo 'No hay instructores disponibles, ve a agregar un instructor </br>';
        }
    ?>
  <label for="aprendices">Agregar Aprendiz:</label>
  <input type="text" class="input-form" name="aprendiz" placeholder="Nombre del Aprendiz">
    <br><br>
    <div class="box-button">
        <input type="submit" value="Agregar Aprendiz" class='my-button button-clr-azul'>
    </div>
</form>   
</div>
