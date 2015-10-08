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

$ciudades = [];

echo "<th>Ciudad</th><th>Max</th><th>Min</th><th>Med</th></tr>";

foreach ($datos as $ciudad => $meses) {
    //Para cada ciudad, sacamos la temp max, min y med
    $max[$ciudad] = max(array_column($meses, 'TMax'));
    $min[$ciudad] = min(array_column($meses, 'TMin'));
    $sumaMax = array_sum(array_column($meses, 'TMax'));
    $sumaMin = array_sum(array_column($meses, 'TMin'));
    $med[$ciudad] = ($sumaMax + $sumaMin) / 24;
    array_push($ciudades, $ciudad);
}

sort($ciudades);
//Ordenamos el array según lo que queramos
//Ordena primero por max, en caso de igualarse ordena por min, 
//y en caso de igualarse, por med
//array_multisort($max,SORT_NUMERIC,SORT_ASC, $min, SORT_NUMERIC, SORT_ASC, $med, SORT_NUMERIC, $datos);


//Una vez ordenado el array, podemos mostrar los datos de cada ciudad
foreach ($ciudades as $ciudad) {
    echo "<tr><td>$ciudad</td>";    
    echo "<td>$max[$ciudad]º</td><td>$min[$ciudad]º</td><td>$med[$ciudad]º</td></tr>";
}
?>
        </table>
    </body>
</html>