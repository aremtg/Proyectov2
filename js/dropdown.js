window.addEventListener("scroll", function(){
  var containerNav = this.document.querySelector(".container_nav");
  containerNav.classList.toggle("abajo", this.window.scrollY>0);
})

const menuIcon = document.querySelector(".menu-icon");
const navMenu = document.querySelector("#nav-menu");

menuIcon.addEventListener("click", function () {
    menuIcon.classList.toggle("active");
    navMenu.classList.toggle("active");
});

const alerta = document.querySelector(".alerta");

alerta.innerHTML =  `<div class="message is-danger">
<div class="message-header">
    <p>Error al iniciar sesion</p>
</div>
<div class="message-body">
<strong>Usuario</strong> no encontrado o no cumple con los parametros!
</div>
</div>`;