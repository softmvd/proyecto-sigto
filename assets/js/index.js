
let divMenu = document.querySelector("#menu").addEventListener("click",desplegar);

function desplegar(){
    let menuSegundo = document.querySelector(".menu-segundo");
    menuSegundo.style.display === "none"? menuSegundo.style.display="flex" : menuSegundo.style.display="none";
}
