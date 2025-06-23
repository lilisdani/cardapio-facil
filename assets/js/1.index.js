// Criando uma variável para armazenar a Classe Beneficios e suas variações

const elementoBeneficio = document.querySelectorAll(".beneficios")

elementoBeneficio.forEach(function(beneficios){
    beneficios.addEventListener("click", function(){
        beneficios.classList.toggle("ativa");
    });
});


