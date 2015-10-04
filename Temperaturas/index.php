<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Temperaturas</title>
        <style>
            table{text-align: center;
                    width: 20%;
                    float: left;
                    margin: 30px;
                    border: 1px solid goldenrod;}
            tr{border: 1px solid goldenrod;}
            .dcha{text-align: right;
                    font-weight: bold;}
            .tit{font-weight: bold;}
            .centrado{text-align: center;
                        width: 100%;}
        </style>
    </head>
    <body>
        <?php
        $ciudades = ["Madrid", "Barcelona", "Sevilla", "Bilbao"];
        $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
        $temps = ["TempMax", "TempMín"];
        ?>
        <form action="temperaturas.php" method="POST">
            <?php
                    foreach ($ciudades as $ciudad) {
                        echo "<table><tr><th colspan=3 name=\"temp[$ciudad]\">$ciudad</th></tr>";
                        echo "<tr class=\"tit\"><td class=\"dcha\">Mes</td><td>Temp m&aacutexima</td><td>Temp m&iacutenima</td></tr>";
                        foreach ($meses as $mes) {
                            echo "<tr><td name=\"temp[$ciudad][$mes]\" class=\"dcha\">$mes</td>";
                            foreach ($temps as $temp) {
                                echo "<td><input type=\"text\" name=\"temp[$ciudad][$mes][$temp]\"></td>";
                            }
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
            ?>
            <div class="centrado"><input type="SUBMIT" value="Enviar"></div>
        </form>
    </body>
</html>
