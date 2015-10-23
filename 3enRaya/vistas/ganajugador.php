<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css/style.css">
        <title>Enhorabuena!</title>
    </head>
    <body>
        <h1>Enhorabuena! Ha ganado a la CPU (aunque tampoco era muy dificil.... :P)</h1>
        <form action="../index.php" method="POST">
            <?php 
                include "tablero.php";
            ?>
            <input type="SUBMIT" value="Volver a jugar" name="botonreset">
        </form>
    </body>
</html>