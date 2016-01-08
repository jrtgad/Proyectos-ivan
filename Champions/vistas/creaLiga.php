<?php
if ($view !== "creaLiga") {
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
            <form action="index.php" method="POST">
                <input type = "submit" name = "logout" value="Log out">
                <div class = "creacion">
                    Nombre:<input type = "text" name = "nombreLiga"><br>
                    Equipos:<input type = "text" name = "equiposString"><br>

                    <input type = "submit" name = "creaLiga" value = "Enviar">

                </div>
            </form>
        </body>
    </html>

<?php } ?>