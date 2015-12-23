var imgUSER = "<img src=\"../img/USER.png\" alt=\"o\"/>";

//Variable para saber si ya hay una imagen puesta
//en ese turno
var imagen = true;

function ponerImagen(celda) {
    //Si no hay ninguna puesta, la pinta y cambia la variable
    if(imagen) {
            celda.innerHTML = 
                    imgUSER + "<input type=\"hidden\"\n\
                    name=\"jugada[" + celda.getAttribute('id') + "]\" value=\"1\">";
            imagen = false;
    } else {
        //Si ya hay img, comprueba que está y se la quita,
        //cambiando la variable a true para poder elegir otra posición
        if (celda.childElementCount === 2) {
                celda.innerHTML = "";
                imagen = true;
            }
    }
}