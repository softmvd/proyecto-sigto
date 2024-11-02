let quantity = 1;

const quantityElement = document.querySelector(".andes-input-stepper__value");
const increaseBtn = document.getElementById("increase-btn");
const decreaseBtn = document.getElementById("decrease-btn");
let precio = document.querySelectorAll(".precio p");




increaseBtn.addEventListener("click", () => {
    let resultado = 0;
    quantity++;
    quantityElement.innerText = quantity;
    resultado =  parseInt(precio[0].innerText) *quantity;
    precio[1].innerText=resultado;
});

decreaseBtn.addEventListener("click", () => {
    let resultado = 0;
    if (quantity > 1) {
        quantity--;
        quantityElement.innerText = quantity;
        resultado =  parseInt(precio[0].innerText) *quantity;
        precio[1].innerText=resultado;
    }
});

let total = document.querySelectorAll(".total-container span");

total.forEach( (t,index)=>{
    t[index]=precio[1];
}
);