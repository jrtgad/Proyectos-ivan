<html>
    <head>
        
    </head>
    <body>
        <table><tr>

<?php

$datos = $_POST['datos'];

foreach ($datos as $ciudad => $meses) {
    echo "<th>Ciudad</th><th>Max</th><th>Min</th><th>med</th></tr>";
    echo "<tr><td>$ciudad</td>";
    foreach ($meses as $mes => $temperaturas) {        
        foreach ($temperaturas as $temp => $valor){
            echo "<td>$valor</td><td></td><td></td>";
        }
    }
    echo "</tr>";
}
?>
        </table>
    </body>
</html>