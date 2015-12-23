<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Conecta 4</title>
        <link rel="stylesheet" href="../css/estilo.css">
        <script src="../js/imagen.js"></script>
    </head>
    <body>
        <form action="../procesa.php" method="POST">
        <h1>Bienvenido al conecta 4</h1>
        <?php
            include "vistas/tablero.php";
        ?>
        <input type=SUBMIT value=Enviar name=botonenvio>
        </form>
    </body>
</html>