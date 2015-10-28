<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css/estilo.css">
        <script src="js/imagen.js"></script>
    </head>
    <body>
        <form action="procesatirada.php" method="POST">
            <h1>Introduzca 10 posiciones para descubrir las minas</h1>
            <?php
                include "vistas/tablero.php";
            ?>
            <input type="SUBMIT" name="botonenvio">
        </form>
    </body>
</html>