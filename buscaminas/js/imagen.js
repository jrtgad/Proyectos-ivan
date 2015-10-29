var imgUSER = "<img src=\"../img/mina.jpg\">";
var imagen = 0;

function setImage(celda) {
    //Si no hay ninguna puesta, la pinta y cambia la variable
    if(imagen < 10) {
        if (celda.childElementCount === 2) {
            celda.innerHTML = "";
            imagen--;
        } else {
            celda.innerHTML = 
                imgUSER + "<input type=\"hidden\"\n\
                name=\"tirada[" + celda.getAttribute('id') + "] value=\"1\">";
            imagen++;
        } 
    }
}

