<<<<<<< HEAD
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
                                echo "<td><input type=\"text\" class=\"lil\"name=\"datos[$ciudad][$mes][$temperaturas]\" value=\"4\"></td>";
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
=======
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
>>>>>>> Secondary
