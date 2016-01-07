<?php
if ($view !== "crear") {
    header("Location: /");
} else {
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <link rel = "stylesheet" href = "../css/screen.css">
        </head>
        <body>
            <h1>Gestión liga</h1>
            <form>
                <input type = "submit" name = "logout">
                <div class = "creacion">
                    Nombre:<input type = "text" name = "nombreLiga"><br>
                    Equipos:<input type = "submit" name = "equiposString"><br>

                    <input type = "submit" name = "creaLiga" value = "Enviar">

                </div>
            </form>
        </body>
    </html>

<?php } ?>