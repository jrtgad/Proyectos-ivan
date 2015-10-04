<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $ciudades = ["Madrid", "Barcelona", "Sevilla", "Bilbao"];
        $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
        $temps = ["Temp max", "Temp mín"];
        ?>
        <form action="temperaturas.php" method="POST">
            <?php
                    foreach ($ciudades as $ciudad) {
                        echo "<table><tr><th colspan=3 name=\"temp[$ciudad]\">$ciudad</th></tr>";
                        echo "<tr><td>Mes</td><td>Temp m&aacutexima</td><td>Temp m&iacutenima</td>";
                        foreach ($meses as $mes) {
                            echo "<tr><td name=\"temp[$ciudad][$mes]\">" + $mes + "</td>";
                            foreach ($temps as $temp) {
                                echo "<td><input type=\"text\" name=\"temp[$ciudad][$mes][$temps]\">" + $temp + "</td></tr>";
                            }
                        }
                        echo "</table>";
                    }
            ?>
            <input type="SUBMIT" value="Enviar">
        </form>
    </body>
</html>
