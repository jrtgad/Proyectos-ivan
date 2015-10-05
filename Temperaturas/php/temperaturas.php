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
        foreach ($temperaturas as $temp => $valor){
            echo "<td>$valor</td>";
        }
    }
    echo "</tr>";
}
?>
        </table>
    </body>
</html>