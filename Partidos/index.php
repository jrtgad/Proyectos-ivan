<<<<<<< HEAD
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
                <table>
                    <tr>
                        <th>Local</th>
                        <th>Resultado</th>
                        <th>Visitante</th>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="datos[visitante]" value="Real Madrid">
                            Real Madrid
                        </td>
                        <td>
                            <input type="text" name="datos[resultado]">
                        </td>
                        <td>
                            <input type="hidden" name="datos[visitante]" value="Manchester United">
                            Manchester United
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="datos[visitante]" value="Real Madrid">
                            Real Madrid
                        </td>
                        <td>
                            <input type="text" name="datos[resultado]">
                        </td>
                        <td>
                            <input type="hidden" name="datos[visitante]" value="Ac Milan">
                            AC Milan
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="datos[visitante]" value="Manchester United">
                            Manchester United
                        </td>
                        <td>
                            <input type="text" name="datos[resultado]">
                        </td>
                        <td>
                            <input type="hidden" name="datos[visitante]" value="Real Madrid">
                            Real Madrid
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="datos[visitante]" value="Manchester United">
                            Manchester United
                        </td>
                        <td>
                            <input type="text" name="datos[resultado]">
                        </td>
                        <td>
                            <input type="hidden" name="datos[visitante]" value="Ac Milan">
                            Ac Milan
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="datos[visitante]" value="Ac Milan">
                            Ac Milan
                        </td>
                        <td>
                            <input type="text" name="datos[resultado]">
                        </td>
                        <td>
                            <input type="hidden" name="datos[visitante]" value="Manchester United">
                            Manchester United
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="datos[visitante]" value="Ac Milan">
                            Ac Milan
                        </td>
                        <td>
                            <input type="text" name="datos[resultado]">
                        </td>
                        <td>
                            <input type="hidden" name="datos[visitante]" value="Real Madrid">
                            Real Madrid
                        </td>
                    </tr>
                </table>
                <input type="submit" value="Enviar" name="">
            </form>
        </div>
    </body>
</html>
=======
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
                    $contadorPartidos = 0;
                    $equiposLocales = ["Real Madrid", "Manchester United", "AC Milan"];
                    $equiposVisitantes = ["Real Madrid", "Manchester United", "AC Milan"];
                    echo "<table><tr><th colspan=4>Resultado</th></tr>";
                    foreach ($equiposLocales as $equipoLoc) {
                        foreach ($equiposVisitantes as $equipoVis) {
                            if ($equipoLoc !== $equipoVis) {
                                echo "<tr><td>" . $equipoLoc . "</td>";
                                echo "<input type=hidden value=\"" . $equipoLoc . "\" name=\"datos[" . $contadorPartidos . "]['eqLoc']\">";
                                echo "<td><input type=text "
                                . "name=\"datos[" . $contadorPartidos . "][golL]\"></td>";
                                echo "<td><input type=text "
                                . "name=\"datos[" . $contadorPartidos . "][golV]\"></td>";
                                echo "<td>" . $equipoVis . "</td></tr>";
                                echo "<input type=hidden value=\"" . $equipoVis . "\" name=\"datos[" . $contadorPartidos . "]['eqVis']\">";
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
>>>>>>> 4603104fc22aa86b2d2ebf162a91514a43d952a7
