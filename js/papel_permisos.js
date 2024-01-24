// let meses = ["Enero","Febrero","Marzo","Abril",
//             "Mayo","Junio","Julio","Agosto","Septiembre",
//             "Octubre","Noviembre","Diciembre"]
// let date = new Date();

// let diaMes = date.getDate();
// let mes = meses[date.getMonth()];
// let año = date.getFullYear();

// let fecha = document.querySelector(".fecha");
// fecha.textContent = diaMes + "/" + mes + "/" + año;

setInterval(() => {
  let boxHora = document.querySelector(".hora");
  let fechaActual = new Date();
  let hora = fechaActual.getHours();
  let minutos = fechaActual.getMinutes();
  let segundos = fechaActual.getSeconds();
  if (minutos <= 9) {
    boxHora.textContent = hora + ":0" + minutos + ":" + segundos;

  }else{
    boxHora.textContent = hora + ":" + minutos + ":" + segundos;
  }
  // ----------------------------------------------------------
function cambiaAMPM() {
  var periodo = document.querySelector(".periodo");

  // Comprobar si la hora actual es menor o igual a 12
  if (hora < 12) {
    // Si es verdadero, establecer el contenido del elemento como "a.m"
    periodo.textContent = "a.m";
  } else {
    // Si es falso, establecer el contenido del elemento como "p.m"
    periodo.textContent = "p.m";
  }
}
cambiaAMPM()

}, 1000);
document.getElementById('botonEnviar').style.display = 'none';

function convertirPermisoAPDF() {
  // Obtener el permiso que deseas convertir
  const permiso = document.getElementById('hoja');

  // Opciones para la conversión a PDF
  const opciones = {
    margin: 1,
    filename: 'permiso.pdf',
    image: { type: 'jpeg', quality: 0.98 },
    html2canvas: { scale: 2 },
    jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
  };

  // Utilizar html2pdf para convertir el permiso a PDF
  html2pdf(permiso, opciones)
    .then((pdfOutput) => {
      // Obtener la cadena de datos URI del PDF
      const pdfDataUri = pdfOutput.output('datauristring');

      // Almacenar la cadena de datos URI en el campo oculto
      document.getElementById('permisoGenerado').value = pdfDataUri;

      // Mostrar el botón de enviar
      document.getElementById('botonEnviar').style.display = 'block';

      // Enviar el formulario automáticamente
      document.forms[0].submit();  // Esto enviará el primer formulario en la página (ajusta según tu estructura HTML)
    })
    .catch((error) => {
      console.error('Error al convertir a PDF:', error);
    });
}

