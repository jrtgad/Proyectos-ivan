<html>
    <head>
        
    </head>
    <body>
        <table><tr>

<?php

$datos = $_POST['datos'];

foreach ($datos as $ciudad => $meses) {
    echo "<td>$ciudad</td>";
    foreach ($meses as $mes => $temperaturas) {
        echo "<td>$mes</td>";
        foreach ($temperaturas as $temp => $valor){
            echo "<td>$temp</td>";
        }
    }
}
?>
        </table>
    </body>
</html>