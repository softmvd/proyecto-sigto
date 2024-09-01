let divTitulo = document.querySelector(".titulo");
console.log(divTitulo);

let h2Collection = document.querySelectorAll(".titulo h2");

console.log(h2Collection);

h2Collection[0].addEventListener("click", mostrarUsuario1);
h2Collection[1].addEventListener("click", mostrarUsuario2);

function mostrarUsuario1() {
    let usuarios = document.querySelectorAll(".usuarios");
    
    // Mostrar el primer usuario y ocultar el segundo
    usuarios[0].style.display = "flex";
    usuarios[1].style.display = "none";
}

function mostrarUsuario2() {
    let usuarios = document.querySelectorAll(".usuarios");
    
    // Mostrar el segundo usuario y ocultar el primero
    usuarios[1].style.display = "flex";
    usuarios[0].style.display = "none";
}
