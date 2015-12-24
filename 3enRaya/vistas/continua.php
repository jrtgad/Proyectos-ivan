<<<<<<< HEAD
<!DOCTYPE html>
<html>
    <head>
        <title>Juego de las 3 en raya</title>
        <link rel="stylesheet" href="css/style.css">
        <script src="js/imagen.js"></script>
    </head>
    <body>
        <h1>Elija una posición</h1>
        <form action="../jugada.php" method="POST">
            <?php
                include "vistas/tablero.php";
            ?>
            <input id="submit" type="submit" name="envio" value="Enviar">
        </form>
    </body>
=======
<!DOCTYPE html>
<html>
    <head>
        <title>Juego de las 3 en raya</title>
        <link rel="stylesheet" href="css/style.css">
        <script src="js/imagen.js"></script>
    </head>
    <body>
        <h1>Elija una posición</h1>
        <form action="../jugada.php" method="POST">
            <?php
                include "vistas/tablero.php";
            ?>
            <input id="submit" type="submit" name="envio" value="Enviar">
        </form>
    </body>
>>>>>>> d08ca635e88c9439c125812d69e09c071049c5c2
</html>