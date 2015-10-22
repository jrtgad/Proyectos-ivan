var imgCPU = "<img src=\"../img/CPU.png\" alt=\"x\"/>";
var imgUSER = "<img src=\"../img/USER.png\" alt=\"o\"/>";

var imagen = true;

function ponerImagen(celda) {    
    if(imagen) {
            celda.innerHTML = imgUSER + "<input type=\"hidden\" name=\"jugada[" + celda.getAttribute('id') + "]\">";
            imagen = false;
    } else {
        if (celda.childElementCount === 2) {
                celda.innerHTML = "";
                imagen = true;
            }
    }
}