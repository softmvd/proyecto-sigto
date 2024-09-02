
let h2Collection = document.querySelectorAll(".registrate div h2");

console.log(h2Collection);

h2Collection[0].addEventListener("click", mostrarUsuario1);
h2Collection[1].addEventListener("click", mostrarUsuario2);

function mostrarUsuario1() {
    let registros = document.querySelectorAll(".registro");
    
    // Mostrar el primer usuario y ocultar el segundo
    registros[0].style.display = "flex";
    registros[1].style.display = "none";
    h2Collection[0].classList.add("deco-btn");
    h2Collection[1].classList.remove("deco-btn");
}

function mostrarUsuario2() {
    let registro = document.querySelectorAll(".registro");
    
    // Mostrar el segundo usuario y ocultar el primero
    registro[1].style.display = "flex";
    registro[0].style.display = "none";
    h2Collection[1].classList.add("deco-btn");
    h2Collection[0].classList.remove("deco-btn");
}
