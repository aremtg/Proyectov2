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
    // Comprobar si la hora actual es menor o igual a 12, para controlar el am y pm
    if (hora < 12) {
      periodo.textContent = "a.m";
    } else {
      periodo.textContent = "p.m";
    }
  }
  cambiaAMPM()

}, 1000);

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
  // Utiliza html2pdf().from() para configurar y generar el PDF
  html2pdf().from(permiso).set(opciones).outputPdf().then(function(pdfOutput) {
    // pdfOutput es el objeto PDF generado
    console.log('PDF generado:', pdfOutput);

    // mostrar una vista previa antes de guardar o imprimir
    // const blob = new Blob([pdfOutput], { type: 'application/pdf' });
    // const url = URL.createObjectURL(blob);
    // window.open(url, '_blank');
    // Si decides guardar automáticamente:
     pdfOutput.save();

  });
}
  // html2pdf().from(permiso).set(personalizado).save();
