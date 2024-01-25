// let meses = ["Enero","Febrero","Marzo","Abril",
//             "Mayo","Junio","Julio","Agosto","Septiembre",
//             "Octubre","Noviembre","Diciembre"]
// let date = new Date();

// let diaMes = date.getDate();
// let mes = meses[date.getMonth()];
// let año = date.getFullYear();

// let fecha = document.querySelector(".fecha");
// fecha.textContent = diaMes + "/" + mes + "/" + año;
document.addEventListener('DOMContentLoaded', function() {
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
      // Comprobar si la hora actual es menor o igual a 12, para controlar el am y pm
      if (hora < 12) {
        periodo.textContent = "a.m";
      } else {
        periodo.textContent = "p.m";
      }
    }
    cambiaAMPM()
  
  }, 1000);
  
});

function convertirPermisoAPDF() {
  const permiso = document.getElementById('hoja');

  // configuracines, personalizadas para convertir a pdf
  const opciones = {
    margin: 1,
    filename: 'permiso.pdf',
    image: { type: 'jpeg', quality: 0.98 },
    html2canvas: { scale: 2 },
    jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
  };
  html2pdf(permiso, opciones)
  .then((pdfOutput) => {
    mostrarVistaPrevia(pdfOutput);
  })
  .catch((error) => {
    console.error('Error al convertir a PDF:', error);

    // Mostrar alerta si hubo un error
    alert('Hubo un error al generar el PDF');
  });


}
// se guarda solo--- este es un problema
// pero se genera y se ve completo
// no sirve la vista previa

function mostrarVistaPrevia(pdfOutput) {
  // Crea una URL de objeto para el PDF generado
  var pdfDataUri = 'data:application/pdf;base64,' + btoa(pdfOutput);
  
  // Carga el PDF en el visor de PDF.js utilizando los métodos open y write
  var viewerContainer = document.getElementById('pdfViewer');
  var iframe = document.createElement('iframe');
  iframe.src = pdfDataUri;
  iframe.width = '800px';
  iframe.height = '600px';
  viewerContainer.innerHTML = '';
  viewerContainer.appendChild(iframe);
}