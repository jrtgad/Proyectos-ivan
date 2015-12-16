<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Champions</title>
        <link rel="stylesheet" href="styles/estilos.css">
    </head>
    <body>
        <div class="centrado">
            <form action="puntua.php" method="POST">
                <h1>Liga de campeones</h1>
                
                    <?php
                    $contadorPartidos = 0;
                    $equiposLocales = ["Real Madrid", "Manchester United", "AC Milan"];
                    $equiposVisitantes = ["Real Madrid", "Manchester United", "AC Milan"];
                    echo "<table><tr><th colspan=4>Resultado</th></tr>";
                    foreach ($equiposLocales as $equipoLoc) {
                        foreach ($equiposVisitantes as $equipoVis) {
                            if ($equipoLoc !== $equipoVis) {
                                echo "<tr><td>" . $equipoLoc . "</td>";
                                echo "<input type=hidden value=\"" . $equipoLoc . "\" name=\"datos[" . $contadorPartidos . "][eqLoc]\">";
                                echo "<td><input type=text "
                                . "name=\"datos[" . $contadorPartidos . "][golL]\"></td>";
                                echo "<td><input type=text "
                                . "name=\"datos[" . $contadorPartidos . "][golV]\"></td>";
                                echo "<td>" . $equipoVis . "</td></tr>";
                                echo "<input type=hidden value=\"" . $equipoVis . "\" name=\"datos[" . $contadorPartidos . "][eqVis]\">";
                                $contadorPartidos += 1;
                            }
                        }
                    }
                    ?>
                </table>
                <input type="submit" value="Enviar">
            </form>
        </div>
    </body>
</html>
