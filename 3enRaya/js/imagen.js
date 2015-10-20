imgCPU = "<img src=\"../img/CPU.png\" alt=\"x\"/>";
imgUSER = "<img src=\"../img/USER.png\" alt=\"o\"/>";

imagen = true;

function ponerImagen(celda) {    
    if(imagen) {
        if (celda.childElementCount < 2)  {
            celda.innerHTML = imgUSER;
            imagen = false;
        } else {
            celda.innerHTML = "";
            imagen = true;
        }
    }
}