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
                    text-align: center;}

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
                    <?php
                    $equiposLocales = ["Real Madrid", "Manchester United", "AC Milan"];
                    $equiposVisitantes = ["Real Madrid", "Manchester United", "AC Milan"];
                    
                    foreach ($equiposLocales as $equipo) {
                        echo "<tr><td>" . $equipo . "</td>";
                        echo "<td><input type=text name=resultado></td>";
                        foreach ($equiposVisitantes as $equipoVis) {
                            while ($equipoVis !== $equipo) {
                                echo "<td>" . $equipoVis . "</td></tr>";
                            }
                        }
                    }
                    ?>
                </table>
                <input type="submit" value="Enviar" name="">
            </form>
        </div>
    </body>
</html>
