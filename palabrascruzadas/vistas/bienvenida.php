<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css/estilos.css">
    </head>
    <body>
        <form action="comprueba.php" method="POST">
            <h1>De las siguientes palabras, adivine cu&aacuteles se han colocado</h1>
            <p>mesa, sarten, pescado, pintor, 
                 medico, ciempies, sotana, pan, cartero, 
                 sol, luna, mapa, puerta</p>
            <?php
                include "vistas/tablero.php";
            ?>
            <input type="SUBMIT" name="botonenvio">
        </form>
    </body>
</html>