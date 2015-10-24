<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hundir la flota</title>
        <link rel="stylesheet" href="css/estilo.css">
        <script src="js/imagen.js"></script>
    </head>
    <body>
        <h1>Elija posiciones para torpedos</h1>
        <form action="compruebaTirada.php" method="POST">
            <table>
        <?php
            for ($i = 0; $i < 10; $i++) {
                echo "<tr>";
                for ($j = 0; $j < 10; $j++){
                    $pos = $i . $j;
                    echo "<td id=\"$pos\" onclick=\"ponerImagen(this)\" value=\"0\"></td>";
                }
                echo "</tr>";
            }
        ?>
            </table>
            <input type="SUBMIT" value="botonEnvio">
        </form>
    </body>
</html>