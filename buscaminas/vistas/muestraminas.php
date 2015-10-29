<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css/estilo.css">
    </head>
    <body>
        <form action="index.php" method="POST">
            <table>
                <?php
                    include "vistas/tablero.php";
                ?>
            </table>
            <input type="SUBMIT" name="botonenvio" value="Volver a jugar">
        </form>
    </body>
</html>