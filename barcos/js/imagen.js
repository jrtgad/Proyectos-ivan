var imgUSER = "<img src=\"../img/mina.jpg\">";

//Variable para saber si ya hay una imagen puesta
//en ese turno
var imagen = 0;

function ponerImagen(celda) {
    //Si no hay ninguna puesta, la pinta y cambia la variable
    if(imagen < 10) {
            celda.innerHTML = 
                    imgUSER + "<input type=\"hidden\"\n\
                    name=\"tiradas[" + celda.getAttribute('id') + "]\" value=\"1\">";
            imagen++;
    } else {
        //Si ya hay img, comprueba que está y se la quita,
        //cambiando la variable a true para poder elegir otra posición
        if (celda.childElementCount === 2) {
                celda.innerHTML = "";
                imagen--;
            }
    }
}