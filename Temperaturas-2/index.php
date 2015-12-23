<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Temperaturas</title>
        <style>
            table{text-align: center;
                    float: left;
                    margin: 20px;
                    border: 1px solid goldenrod;}
            
            tr{border: 1px solid goldenrod;}
            
            .dcha{text-align: right;
                    font-weight: bold;}
            
            .tit{font-weight: bold;}
            
            .centrado{text-align: center;
                        clear: both;}
            
            .lil{width: 35px;}
                        
        </style>
    </head>
    <body>
        <?php
        $ciudades = ["Madrid", "Barcelona", "Sevilla", "Bilbao"];
        $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
        $temps = ["TMax", "TMin"];
        ?>
        <form action="php/temperaturas.php" method="POST">
            <?php
                    foreach ($ciudades as $ciudad) {
                        echo "<table><tr><th colspan=3>$ciudad</th></tr>";
                        echo "<tr class=\"tit\"><td class=\"dcha\">Mes</td><td>Tmax</td><td>Tmin</td></tr>";
                        foreach ($meses as $mes) {
                            echo "<tr><td class=\"dcha\">$mes</td>";
                            foreach ($temps as $temperaturas) {
                                echo "<td><input type=\"text\" class=\"lil\"name=\"datos[$ciudad][$mes][$temperaturas]\"></td>";
                            }
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
            ?>
            <div class="centrado"><input type="SUBMIT" value="Enviar" class="centrado"></div>
        </form>
    </body>
</html>