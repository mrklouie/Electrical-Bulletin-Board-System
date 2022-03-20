const menu = document.getElementById("menu");
const navBarLinks = document.querySelector(".navbar-links");
const nav = document.querySelector(".navbar");



menu.addEventListener("click", ()=>{
    navBarLinks.classList.toggle("activee");
    nav.style.padding = "0";
  
})
