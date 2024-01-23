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

// ----------------------------------------------------------
function convertirPermisooAPDF() {
  // Obtener el formulario que deseas convertir
  const formulario = document.getElementById('hoja');

  // Opciones para la conversión a PDF
  const opciones = {
    margin: 10,
    filename: 'formulario.pdf',
    image: { type: 'jpeg', quality: 0.98 },
    html2canvas: { scale: 2 },
    jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
  };

  // Utilizar html2pdf para convertir el formulario a PDF
  html2pdf(formulario, opciones)
    .then((pdfOutput) => {
      // Crear un enlace de descarga
      const enlaceDescarga = document.createElement('a');
      enlaceDescarga.href = pdfOutput.output('bloburl');
      enlaceDescarga.download = 'formulario.pdf';

      // Agregar el enlace al cuerpo del documento
      document.body.appendChild(enlaceDescarga);

      // Simular un clic en el enlace para iniciar la descarga
      enlaceDescarga.click();

      // Eliminar el enlace del cuerpo del documento
      document.body.removeChild(enlaceDescarga);
    })
    .catch((error) => {
      console.error('Error al convertir a PDF:', error);
    });
}

