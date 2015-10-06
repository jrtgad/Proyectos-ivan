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
echo "<th>Ciudad</th><th>Max</th><th>Min</th><th>med</th></tr>";
foreach ($datos as $ciudad => $meses) {
    
    echo "<tr><td>$ciudad</td>";
    $max[$ciudad] = max(array_column($meses, 'TMax'));
    $min[$ciudad] = min(array_column($meses, 'TMin'));
    $sumaMax = array_sum(array_column($meses, 'TMax'));
    $sumaMin = array_sum(array_column($meses, 'TMin'));
    $med[$ciudad] = ($sumaMax + $sumaMin) / 24;
    
    array_multisort($max, $min, $med, $datos);    
    
    echo "<td>$max[$ciudad]</td><td>$min[$ciudad]</td><td>$med[$ciudad]</td></tr>";
}
?>
        </table>
    </body>
</html>