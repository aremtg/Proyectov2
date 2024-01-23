// let meses = ["Enero","Febrero","Marzo","Abril",
//             "Mayo","Junio","Julio","Agosto","Septiembre",
//             "Octubre","Noviembre","Diciembre"]
// let date = new Date();

// let diaMes = date.getDate();
// let mes = meses[date.getMonth()];
// let año = date.getFullYear();

// let fecha = document.querySelector(".fecha");
// fecha.textContent = diaMes + "/" + mes + "/" + año;

// setInterval(() => {
//   let boxHora = document.querySelector(".hora");
//   let fechaActual = new Date();
//   let hora = fechaActual.getHours();
//   let minutos = fechaActual.getMinutes();
//   let segundos = fechaActual.getSeconds();
//   if (minutos <= 9) {
//     boxHora.textContent = hora + ":0" + minutos + ":" + segundos;

//   }else{
//     boxHora.textContent = hora + ":" + minutos + ":" + segundos;
//   }
// }, 1000);

function cambiaAMPM(){
  var periodo = document.querySelector(".periodo");
  if (periodo.textContent=="p.m") {
    periodo.textContent= "a.m";
  } else {
    periodo.textContent= "p.m";
  }
}

function generarPDF(event) {
  event.preventDefault();

  const hoja = document.querySelector('.hoja');
  if (!hoja) {
    alert('No se encuentra el elemento con la clase .hoja');
    return;
  }

  // Crear un nuevo objeto jsPDF
  const pdf = new jsPDF();

  // Obtener el contenido HTML del elemento .hoja
  const contenido = hoja.innerHTML;

  // Agregar el contenido al PDF utilizando fromHTML
  pdf.fromHTML(contenido, 15, 15, {
    width: 170 // ajusta el ancho según tus necesidades
  });

  // Guardar el PDF con un nombre específico (opcional)
  pdf.save('permiso.pdf');
}

function validarYEnviar() {
  const inputEnviaPermiso = document.querySelector('.resultado form input');

  // Verificar si el valor del input no está vacío
  if (inputEnviaPermiso.value === '') {
    alert('Aún no se ha generado el PDF. Por favor, genera el PDF antes de enviar.');
    return false; // Detener el envío del formulario
  }

  // Si el valor no está vacío, permitir el envío del formulario
  return true;
}

// Asignar la función al evento click del botónEnviar
document.getElementById('botonEnviar').addEventListener('click', validarYEnviar);


// function generarPermiso() {
 
//   html2canvas(document.querySelector(".hoja")).then(function (captura) {
//     var permisoGenerado = captura.toDataURL();
//     var inputEnviaPermiso = document.querySelector('.resultado form input');
  
//     inputEnviaPermiso.name = 'imagen_generada';
//     inputEnviaPermiso.value = permisoGenerado;

//   });
// }
// document.getElementById('botonEnviar').addEventListener('click', function() {
//   var inputEnviaPermiso = document.querySelector('.resultado form input');

//   if (inputEnviaPermiso.value === '') {
//     alert('Aún no se ha generado el permiso');
//     return; // Detener la ejecución si el campo está vacío
//   }
// });

// function generarPermiso() {

//   var resultado = document.querySelector(".resultado");
//   var img = resultado.querySelector("img");

//   if (img) {
//   resultado.innerHTML = ` `;
//   }
//   html2canvas(document.querySelector(".hoja")).then(function(captura){
//       // el SRC DE LA IMG crear
//       var img = new Image();
//       img.src = captura.toDataURL();

//       // se generooo y se agrego
//       resultado.innerHTML = ` `;
//       resultado.appendChild(img);
      
//   });
// }
// function cancelarPermiso(){
// var resultado = document.querySelector(".resultado");
// resultado.innerHTML = `<h1>Aqui se generara su permiso</h1> `;

// }