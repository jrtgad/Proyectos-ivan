<html>
    <head>
        
    </head>
    <body>
<?php

$temps = $_POST['temp'];

$ciudades = $temps['ciudad'];
$meses = $temps['ciudad']['mes'];
$temperaturas = $temps['ciudad']['mes']['temperaturas'];
    
foreach ($ciudades as $ciudad) {
                        echo "<table><tr><th colspan=3>$ciudad</th></tr>";
                        echo "<tr class=\"tit\"><td class=\"dcha\">Mes</td><td>Tm&aacutex</td><td>Tm&iacuten</td></tr>";
                        foreach ($meses as $mes) {
                            echo "<tr><td class=\"dcha\">$mes</td>";
                            foreach ($temps as $temperaturas) {
                                echo "<td><input type=\"text\" class=\"lil\"name=\"temp[$ciudad][$mes][$temperaturas]\"></td>";
                            }
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
?>

            </body>
</html>