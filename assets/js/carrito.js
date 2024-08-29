let quantity = 1;

const quantityElement = document.querySelector(".andes-input-stepper__value");
const increaseBtn = document.getElementById("increase-btn");
const decreaseBtn = document.getElementById("decrease-btn");

increaseBtn.addEventListener("click", () => {
    quantity++;
    quantityElement.innerText = quantity;
});

decreaseBtn.addEventListener("click", () => {
    if (quantity > 1) {
        quantity--;
        quantityElement.innerText = quantity;
    }
});
