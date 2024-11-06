let quantityElements = document.querySelectorAll(".andes-input-stepper__value");
let increaseBtns = document.querySelectorAll(".increase-btn");
let decreaseBtns = document.querySelectorAll(".decrease-btn");
let precios = document.querySelectorAll(".precio p");
let darPrecio = document.querySelectorAll(".dar-precio");
let precioArt = document.querySelectorAll(".precio-art");

function actualizarCantidad(indice, incremento) {
    let quantity = parseInt(quantityElements[indice].innerText);
    quantity += incremento;
    if (quantity < 1) quantity = 1;
    quantityElements[indice].innerText = quantity;

    let precioUnitario = parseInt(precios[indice * 2].innerText); // Obtener el precio unitario
    let resultado = precioUnitario * quantity;
    precios[indice * 2 + 1].innerText = resultado; // Actualizar el precio total del producto

    calcular(); // Actualizar el total general
}

increaseBtns.forEach((btn, index) => {
    btn.addEventListener("click", () => actualizarCantidad(index, 1));
});

decreaseBtns.forEach((btn, index) => {
    btn.addEventListener("click", () => actualizarCantidad(index, -1));
});

function calcular() {
    precioTotal = 0;

    for (let p of precioArt) {
        precioTotal += parseInt(p.innerText);
    }

    for (let d of darPrecio) {
        d.innerText = `$${precioTotal.toFixed(2)}`;
    }
}


calcular(); // Calcular al cargar la página
