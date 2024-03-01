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
    
    // Agrega un cero delante de los minutos y segundos si son menores a 10
    minutos = minutos < 10 ? '0' + minutos : minutos;

    hora = hora < 10 ? '0' + hora : hora;
    // Formatea la hora en formato "HH:mm"
    let horaFormateada = hora + ":" + minutos;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
    
    // Actualiza el valor del campo de entrada
    boxHora.value = horaFormateada;
  }, 1000);
});
