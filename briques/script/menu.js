const btnDeco = document.getElementById("deco");
const imgProfil = document.getElementById("profilbase");
let cpt = 0; 

console.log("ok");

imgProfil.addEventListener("click", () =>{
    switch(cpt){
        case 0:
            btnDeco.style.display = "block";
            cpt += 1;
        break;
        case 1:
            btnDeco.style.display = "none";
            cpt = 0;
        break;
    }
})