<?php 
date_default_timezone_set("America/Bogota");
?>
    <div class="hoja">
        <div class="div-fecha">
            <div class="fecha"><?php  ?></div>
        </div>
            <div>
                <label for="instructor-lista">Instructor:</label>
                    <select id="instructor-lista">
                        <option value="opcion1">Opción 1</option>
                        <option value="opcion2">Opción 2</option>
                        <option value="opcion3">Opción 3</option>
                    </select>
            </div>
            <div>
                <label for="aprendiz-lista">Aprendiz:</label>
                    <select id="aprendiz-lista">
                        <option value="opcion1">Opción 1</option>
                        <option value="opcion2">Opción 2</option>
                        <option value="opcion3">Opción 3</option>
                    </select>
            </div>
        <div>
            <label for="titulada">Titulada:</label>
            <input type="text" id="titulada" name="name_titulada" />
        </div>
        <div class="div-ficha-ambiente">
                <div>
                    <label for="ficha">Ficha:</label>
                    <input type="text" id="ficha" name="icha"/>
                </div>
                <div>
                    <label for="ambiente">Ambiente:</label>
                    <input type="text" id="ambiente" name="name_ambiente" />
                </div>
        </div> 
            <div class="div-hora">
                <label for="hora">Hora de salida:</label>
                <div id="hora" class="hora"></div>
                <div class="periodo" onclick="cambiaAMPM()">a.m</div>
            </div>
            <div class="div-motivo">
                <label for="motivo">Movitivo de la salida:</label>
                <textarea id="motivo" rows="4" cols="50"></textarea>
            </div>
           
    </div>
    
    <div class="resultado">
                <h1>Aqui se generara su permiso</h1>
            </div>
    <div class="box-button">    
            <a href="index.php?vista=datos_permisos" class="my-button button-clr-morado">
                <input type="image" src="../imagenes/registro-icon.svg" id="registro-aprendiz" alt="">
                <label for="registro-aprendiz">Ver datos</label>
            </a>
                <button class="btn-generar-permiso my-button button-clr-morado" onclick="generarPermiso()">Generar</button>
                <button class="btn-cancelar-permiso my-button button-clr-morado" onclick="cancelarPermiso()">Cancelar</button>
    </div>
<script>
    function generarPermiso() {

var resultado = document.querySelector(".resultado");
var img = resultado.querySelector("img");

if (img) {
  resultado.innerHTML = ` `;
}
  html2canvas(document.querySelector(".hoja")).then(function(captura){
    // el SRC DE LA IMG crear
    var img = new Image();
    img.src = captura.toDataURL();

    // se generooo y se agrego
    resultado.innerHTML = ` `;
    resultado.appendChild(img);
    
  });
}
function cancelarPermiso(){
  var resultado = document.querySelector(".resultado");
  resultado.innerHTML = `<h1>Aqui se generara su permiso</h1> `;

}
</script>