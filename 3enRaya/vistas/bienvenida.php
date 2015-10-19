<html>
    <head>
        <meta charset="UTF-8">
        <title>Juego de las 3 en raya</title>
        <link rel="stylesheet" href="../css/style.css">
        <script src="js/imagen.js"></script>
    </head>
    <body>
        <h1>Elija una posición</h1>
        <form action="../jugada.php" method="POST">
        <?php
            include "tablero.php";
        ?>
            <input type="SUBMIT" value="Enviar">
        </form>
    </body>
</html>
