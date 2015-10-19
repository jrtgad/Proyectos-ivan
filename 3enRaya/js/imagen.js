imgCPU = "<img src=\"../img/CPU.png\" alt=\"x\"/>";
imgUSER = "<img src=\"../img/USER.png\" alt=\"o\"/>";

function ponerImagen(celda) {
    if (celda.childElementCount === 2)  {
        celda.innerHTML = "";
    } else {
        celda.innerHTML = imgUSER;        
    }
}