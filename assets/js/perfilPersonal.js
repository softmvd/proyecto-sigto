let flechas = document.querySelectorAll(".flechita");
let formularios = document.querySelectorAll(".form");


flechas.forEach((flecha,index)=>{
    flecha.addEventListener("click", ()=>{
        if(formularios[index].style.display == "none"){
            formularios[index].style.display = "flex";
        }else{
            formularios[index].style.display = "none";
        }
        
    })
})



