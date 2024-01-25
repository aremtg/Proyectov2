// let meses = ["Enero","Febrero","Marzo","Abril",
//             "Mayo","Junio","Julio","Agosto","Septiembre",
//             "Octubre","Noviembre","Diciembre"]
// let date = new Date();

// let diaMes = date.getDate();
// let mes = meses[date.getMonth()];
// let año = date.getFullYear();

// let fecha = document.querySelector(".fecha");
// fecha.textContent = diaMes + "/" + mes + "/" + año;
import jsPDF from 'jspdf';
import html2pdf from 'html2pdf.js';

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

// function convertirPermisoAPDF() {
//   const permiso = document.getElementById('hoja');
//   const opciones = {
//     margin: 1,
//     filename: 'permiso.pdf',
//     image: { type: 'webp', quality: 0.98 },
//     html2canvas: {
//       scale: 2
//     },
//     jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
//   };

//   html2pdf(permiso, opciones)
//     .then((pdfOutput) => {
//      console.log(pdfOutput);
//     })
//     .catch((error) => {
//       console.error('Error al convertir a PDF:', error);
     
//     });
// }

function convertirPermisoAPDF() {
  const permiso = document.getElementById('hoja');

  // configuracines, personalizadas para convertir a pdf
  const opciones = {
    margin: 2,
    filename: 'permiso.pdf',
    image: { type: 'jpeg', quality: 0.98 },
    html2canvas: { scale: 2 },
    jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
  };
  html2pdf(permiso, opciones)
  .then((pdfOutput) => {
    console.log(pdfOutput);
  })
  .catch((error) => {
    console.error('Error al convertir a PDF:', error);

    // Mostrar alerta si hubo un error
    alert('Hubo un error al generar el PDF');
  });

window.onload = function() {
  convertirPermisoAPDF();
};

}


// queda perfecto para pc
// function convertirPermisoAPDF() {
//   const permiso = document.getElementById('hoja');

//   // configuracines, personalizadas para convertir a pdf
//   const opciones = {
//     margin: 2,
//     filename: 'permiso.pdf',
//     image: { type: 'png', quality: 0.98 },
//     html2canvas: { scale: 2 },
//     jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
//   };
//   html2pdf(permiso, opciones)
//   .then((pdfOutput) => {
//     console.log(pdfOutput);
//   })
//   .catch((error) => {
//     console.error('Error al convertir a PDF:', error);

//     // Mostrar alerta si hubo un error
//     alert('Hubo un error al generar el PDF');
//   });


// }


//  sirve
// function convertirPermisoAPDF() {
//   const permiso = document.getElementById('hoja');
//   const opciones = {
//     margin: 1,
//     filename: 'permiso.pdf',
//     image: { type: 'webp', quality: 0.98 },
//     html2canvas: { 
//       scale: 2
//     },
//     jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
//   };
//   html2pdf(permiso, opciones)
//   .then((pdfOutput) => {
//     console.log(pdfOutput);
//   })
//   .catch((error) => {
//     console.error('Error al convertir a PDF:', error);

//     // Mostrar alerta si hubo un error
//     alert('Hubo un error al generar el PDF');
//   });


// }



// casi perfecto, se muestra bien en pc con pantalla grande, y en movil se corta una parte pequeña pero se ve bien
// function convertirPermisoAPDF() {
//   const permiso = document.getElementById('hoja');

//   // configuracines, personalizadas para convertir a pdf
//   const opciones = {
//     margin: 2,
//     filename: 'permiso.pdf',
//     image: { type: 'jpeg', quality: 0.98 },
//     html2canvas: { scale: 2 },
//     jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
//   };
//   html2pdf(permiso, opciones)
//   .then((pdfOutput) => {
//     console.log(pdfOutput);
//   })
//   .catch((error) => {
//     console.error('Error al convertir a PDF:', error);

//     // Mostrar alerta si hubo un error
//     alert('Hubo un error al generar el PDF');
//   });


// }

// function convertirPermisoAPDF() {
//   const permiso = document.getElementById('hoja');

//   // configuracines, personalizadas para convertir a pdf
//   const opciones = {
//     margin: [0.5, 2],
//     filename: 'permiso.pdf',
//     image: { type: 'jpeg', quality: 1.98 },
//     html2canvas: { scale: 2 },
//     jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
//   };
//   html2pdf(permiso, opciones)
//   .then((pdfOutput) => {
//     console.log(pdfOutput);
//   })
//   .catch((error) => {
//     console.error('Error al convertir a PDF:', error);

//     // Mostrar alerta si hubo un error
//     alert('Hubo un error al generar el PDF');
//   });

// window.onload = function() {
//   convertirPermisoAPDF();
// };

// }










// npm i jspdf
// npm i html2pdf.js@0.9.0