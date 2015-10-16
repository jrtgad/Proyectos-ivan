<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Champions</title>
        <style>
            form    {text-align: center;
                    display: block;}

            table   {border: solid 3px red;
                    border-collapse: collapse;
                    margin: 0px auto;}

            th      {text-align: center;
                    font: normal bold 2em/1.5 sans-serif;}

            td      {border-top: solid 1px;
                    border-bottom: solid 1px;}

            input   {text-align: center;}

        </style>
    </head>
    <body>
        <div class="centrado">
            <form action="puntua.php" method="POST">
                <h1>Liga de campeones</h1>
                
                    <?php
                    $equiposLocales = ["Real Madrid", "Manchester United", "AC Milan"];
                    $equiposVisitantes = ["Real Madrid", "Manchester United", "AC Milan"];
                    echo "<table><tr><th colspan=3>Resultado</th></tr>";
                    foreach ($equiposLocales as $equipoLoc) {
                        foreach ($equiposVisitantes as $equipoVis) {
                            if ($equipoLoc !== $equipoVis) {
                                echo "<tr><td>" . $equipoLoc . "</td>";
                                echo "<td><input type=text "
                                . "name=datos[" . $equipoLoc . "][" . $equipoVis . "][resultado] value=\"1-1\"></td>";
                                echo "<td>" . $equipoVis . "</td></tr>";
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
