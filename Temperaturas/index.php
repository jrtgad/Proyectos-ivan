<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Temperaturas ciudades</title>
        <style>
            table{float: left;
                    margin: 10px;}
            
            th{text-align: center;}
            
            .mes{text-align: right;}
            
            td{text-align: center;}
            
            .ciudad{font-size: 25px;}
            
            .datos{width: 60px;}
        </style>
    </head>
    <body>
        <?php
            $ciudades = ["Madrid", "Barcelona", "Sevilla", "Bilbao"];
            $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
            $temps = ["TempMax", "TempMin"];
        ?>
        
        <form action="temperaturas.php" method="POST">
        
        <?php
            foreach ($ciudades as $ciudad) {
                echo "<table><th colspan=3 class=\"ciudad\" name=\"temps['ciudad']\">$ciudad</th>";
                echo "<tr><th class=\"mes\">Mes</th><th>TempMax</th><th>TempMin</th>";
                foreach ($meses as $mes) {
                    echo "<tr><td class=\"mes\" name=\"temps['ciudad']['mes']\">$mes</td>";
                    foreach ($temps as $temp) {
                        echo "<td><input type=\"number\" class=\"datos\" name=\"temps['ciudad']['mes']['temp']\"></td>";
                    }
                    echo "</tr>";
                }
            }
            echo "</table>";
        ?>
            <input type="SUBMIT" value="Rellena">
        </form>
    </body>
</html>
