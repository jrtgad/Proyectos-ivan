imgCPU = "<img src=\"../img/CPU.png\" alt=\"x\"/>";
imgUSER = "<img src=\"../img/USER.png\" alt=\"o\"/>";

imagen = false;

function ponerImagen(celda) {    
    if (celda.childElementCount < 2)  {
        celda.innerHTML = imgUSER;
        imagen = true;
    } else {
        celda.innerHTML = "";
        imagen = false;
    }
}