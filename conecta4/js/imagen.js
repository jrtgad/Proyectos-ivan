function colorea(celda) {
    color = true;
    
            alert(celda.style.bgcolor);
    
    if (color) {
        if (celda.style.bgcolor !== "red") {
            celda.style.bgcolor = red;
            celda.innerHTML = "<input type=\"hidden\" name=\"jugada[" + 
                                    celda.getAttribute('id') + 
                                "] value=\"1\">";
            color = false;
        }
    } else {
        if (celda.style.bgcolor === "red") {
            celda.style.bgcolor = "white";
            celda.innerHTML = "";
            color = true;
        }
    }
}

