<html>
    <head>
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
        <table><tr>

<?php

$datos = $_POST['datos'];

foreach ($datos as $ciudad => $meses) {
    echo "<th>Ciudad</th><th>Max</th><th>Min</th><th>med</th></tr>";
    echo "<tr><td>$ciudad</td>";
    $max = max(array_column($datos[$ciudad][$mes]['Tmax'], $meses));
    $min = min(array_column($datos[$ciudad][$mes]['Tmin'], $meses));
    $med = (array_sum(array_column($datos[$ciudad][$mes]['Tmax'], $meses)) + array_sum(array_column($datos[$ciudad][$mes]['Tmin'], $meses))) / 24;
    foreach ($meses as $mes => $temperaturas) {        
        foreach ($temperaturas as $temp => $valor){
            echo "<td>$max</td><td>$min</td><td>$med</td>";
        }
    }
    echo "</tr>";
}
?>
        </table>
    </body>
</html>