<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css/estilo.css">
    </head>
    <body>
        <form action="index.php" method="POST">
            <h1>Disparos sin mina = 0</h1>
            <h1>Mina sin estallar = *</h1>
            <h1>Disparo acertado  = X</h1>
            <table>
                <?php
                    include "vistas/tablero.php";
                ?>
            </table>
            <br>
            <input type="SUBMIT" name="botonenvio" value="Volver a jugar">
        </form>
    </body>
</html>