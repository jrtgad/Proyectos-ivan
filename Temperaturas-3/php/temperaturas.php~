<<<<<<< HEAD
<html>
    <head>
        <title>Temperaturas</title>
        <style>
            table{text-align: center;
                    margin: auto;
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

echo "<th>Ciudad</th><th>Max</th><th>Min</th><th>Med</th></tr>";

$ciudades = [];

foreach ($datos as $ciudad => $meses) {
    //Para cada ciudad, sacamos la temp max, min y med
    $max[$ciudad] = max(array_column($meses, 'TMax'));
    $min[$ciudad] = min(array_column($meses, 'TMin'));
    $sumaMax = array_sum(array_column($meses, 'TMax'));
    $sumaMin = array_sum(array_column($meses, 'TMin'));
    $med[$ciudad] = round((($sumaMax + $sumaMin) / 24),2);
    
    //Metemos solo las ciudades al array $ciu[0] = Madrid...
    //array_push($ciudades, $ciudad);
}

//Ordenamos por nombre de ciudad
//sort($ciudades);

//Ordenamos el array según lo que queramos
//Ordena primero por max, en caso de igualarse ordena por min, 
//y en caso de igualarse, por med
array_multisort($max, SORT_NUMERIC, $min, SORT_NUMERIC, $med, SORT_NUMERIC, $datos);

//Una vez ordenado el array, podemos mostrar los datos de cada ciudad
foreach ($datos as $ciudad => $meses) {
    echo "<tr><td>" . ucwords($ciudad) . "</td>";    
    echo "<td>$max[$ciudad]</td><td>$min[$ciudad]</td><td>$med[$ciudad]</td></tr>";
}
?>
        </table>
    </body>
=======
<html>
    <head>
        <title>Temperaturas</title>
        <style>
            table{text-align: center;
                    margin: auto;
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

echo "<th>Ciudad</th><th>Max</th><th>Min</th><th>Med</th></tr>";

$ciudades = [];

foreach ($datos as $ciudad => $meses) {
    //Para cada ciudad, sacamos la temp max, min y med
    $max[$ciudad] = max(array_column($meses, 'TMax'));
    $min[$ciudad] = min(array_column($meses, 'TMin'));
    $sumaMax = array_sum(array_column($meses, 'TMax'));
    $sumaMin = array_sum(array_column($meses, 'TMin'));
    $med[$ciudad] = round((($sumaMax + $sumaMin) / 24),2);
    
    //Metemos solo las ciudades al array $ciu[0] = Madrid...
    //array_push($ciudades, $ciudad);
}

//Ordenamos por nombre de ciudad
//sort($ciudades);

//Ordenamos el array según lo que queramos
//Ordena primero por max, en caso de igualarse ordena por min, 
//y en caso de igualarse, por med
array_multisort($max, SORT_NUMERIC, $min, SORT_NUMERIC, $med, SORT_NUMERIC, $datos);

//Una vez ordenado el array, podemos mostrar los datos de cada ciudad
foreach ($datos as $ciudad => $meses) {
    echo "<tr><td>" . ucwords($ciudad) . "</td>";    
    echo "<td>$max[$ciudad]</td><td>$min[$ciudad]</td><td>$med[$ciudad]</td></tr>";
}
?>
        </table>
    </body>
>>>>>>> d08ca635e88c9439c125812d69e09c071049c5c2
</html>