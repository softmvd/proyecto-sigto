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
    
    // Agregar "deco-btn" al primer h2 y quitarla del segundo
    h2Collection[0].classList.add("deco-btn");
    h2Collection[1].classList.remove("deco-btn");
}

function mostrarUsuario2() {
    let usuarios = document.querySelectorAll(".usuarios");
    
    // Mostrar el segundo usuario y ocultar el primero
    usuarios[1].style.display = "flex";
    usuarios[0].style.display = "none";
    
    // Agregar "deco-btn" al segundo h2 y quitarla del primero
    h2Collection[1].classList.add("deco-btn");
    h2Collection[0].classList.remove("deco-btn");
}
