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
    
    // Agrega un cero delante de los minutos y segundos si son menores a 10
    minutos = minutos < 10 ? '0' + minutos : minutos;
    segundos = segundos < 10 ? '0' + segundos : segundos;
    hora = hora < 10 ? '0' + hora : hora;
    // Formatea la hora en formato "HH:mm"
    let horaFormateada = hora + ":" + minutos + ":" + segundos;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
    
    // Actualiza el valor del campo de entrada
    boxHora.value = horaFormateada;
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
// function convertirPermisoAPDF() {
//   const permiso = document.getElementById('hoja');

//   // Configuraciones
//   const opciones = {
//     margin: 2,
//     filename: 'permiso.pdf',
//     image: { type: 'jpeg', quality: 0.98 },
//     html2canvas: { scale: 2 },
//     jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' },
//     output: 'datauristring' // Genera la cadena Base64 sin abrir el diálogo
//   };

//   html2pdf(permiso, opciones)
//     .then((output) => {
//       console.log(output);
//       mostrarVistaPrevia(output);
//     })
//     .catch((error) => {
//       console.error('Error al convertir a PDF:', error);
//     });
//     function mostrarVistaPrevia(output) {
//   // Crea una URL de objeto para el PDF generado
//   if (output) {
//     // Verifica si la cadena comienza con "data:application/pdf;base64,"
//     if (output.startsWith('data:application/pdf;base64,')) {
//       // Carga el PDF en el visor de PDF utilizando los métodos open y write
//       var viewerContainer = document.getElementById('pdfViewer');
//       var iframe = document.createElement('iframe');
//       iframe.src = output;
//       iframe.width = '100%';
//       iframe.height = '600px';
//       viewerContainer.innerHTML = '';
//       viewerContainer.appendChild(iframe);
//     } else {
//       console.error('La cadena Base64 no tiene el formato esperado.');
//     }
//   } else {
//     console.error('La cadena Base64 es undefined.');
//   }
// }

// }

  // También puedes abrir la vista previa en una nueva ventana
  // window.open(pdfDataUri, '_blank');

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