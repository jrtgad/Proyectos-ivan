<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css/estilos.css">
    </head>
    <body>
        <form action="index.php" method="POST">
            <h1>No ha acertado</h1>
                <?php
                    echo $msg;
                ?>
            <input type="text" name="num">
            <input type="SUBMIT" value="Enviar" name="enviar">
        </form>
    </body>
</html>