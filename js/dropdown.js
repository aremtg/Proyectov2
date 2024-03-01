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
