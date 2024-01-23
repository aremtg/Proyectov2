
<div>
<h1 class='panel-heading'>Agregar instructor</h1>
<form action="./php/guardarDatosPermisos.php" class="box" method="POST">

<div class="field">
    <label class="label" for="nombreInstructor">Nombre del Instructor:</label>
    <div class="control">
        <input class="input" type="text" id="nombreInstructor" name="nombre_instructor" required>
    </div>
</div>

<div class="field">
    <label class="label" for="contacto">Contacto:</label>
    <div class="control">
        <input class="input" type="text" id="contacto" name="contacto" placeholder="Contacto" required>
    </div>
</div>

<div class="field">
    <label class="label" for="ntitulada">Titulada:</label>
    <div class="control">
        <input class="input" type="text" id="ntitulada" name="ntitulada" placeholder="Titulada" required>
    </div>
</div>

<div class="field">
    <label class="label" for="ficha">Ficha:</label>
    <div class="control">
        <input class="input" type="number" id="ficha" name="ficha" placeholder="Ficha" required>
    </div>
</div>

<div class="field">
    <label class="label" for="ambiente">Ambiente:</label>
    <div class="control">
        <input class="input" type="text" id="ambiente" name="ambiente" placeholder="Ambiente" required>
    </div>
</div>

<div class="field">
    <div class="box-button">
    <input type="submit" class="my-button button-clr-azul" value="Guardar">
    </div>
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
