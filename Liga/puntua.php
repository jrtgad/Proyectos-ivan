<html>
    <head>
        <title>Champions</title>
        <link rel="stylesheet" href="styles/estilos.css">
    </head>
    <body>
        <h1>Máximos goleadores en casa</h1>
            <table>
                <tr>
                    <th>
                        Equipo
                    </th>
                    <th>
                        Puntos
                    </th>
                    <th>
                        Goles Favor
                    </th>
                    <th>
                        Goles Contra
                    </th>
                    <th>
                        Gol Average
                    </th>
                </tr>
<?php 

$datos = $_POST['datos'];
$equipo = [];

foreach ($datos as $partido) {
    if (!(in_array($partido['eqLoc'], $equipo))) {
            $equipo[$partido['eqLoc']] = ["puntos" => 0,"golesF" => 0,"golesC" => 0, "average" => 0];
    }
    if (!(in_array($partido['eqVis'], $equipo))) {
        $equipo[$partido['eqVis']] = ["puntos" => 0,"golesF" => 0,"golesC" => 0, "average" => 0];
    }
}

function puntua($golL, $golV) {
    if ($golL > $golV) {
        $puntos = 1;
    } else if ($golL < $golV) {
        $puntos = -1;
    } else {
        $puntos = 0;
    }
    return $puntos;
}

//Para cada partido
foreach ($datos as $partido) {
    //Sacamos la key para comparar
        
    $ganador = puntua($partido['golL'], $partido['golV']);
    
    $equipo[$partido['eqVis']]["golesF"] += $partido['golV'];
    $equipo[$partido['eqVis']]["golesC"] += $partido['golL'];
    $equipo[$partido['eqLoc']]["golesF"] += $partido['golL'];
    $equipo[$partido['eqLoc']]["golesC"] += $partido['golV'];
    
    if($ganador < 0) {
        $equipo[$partido['eqVis']]["puntos"] += 3;
    } else {
        if ($ganador === 0) {
            $equipo[$partido['eqVis']]["puntos"] += 1;
            $equipo[$partido['eqLoc']]["puntos"] += 1;
        } else {
            $equipo[$partido['eqLoc']]["puntos"] += 3;
        }
    }
}

//$key3 es cada nombre de equipo
foreach ($equipo as $key3 => $eq) {
    $equipo[$key3]['average'] = $equipo[$key3]["golesF"] - $equipo[$key3]["golesC"];
}

array_multisort(array_column($equipo, 'puntos'), SORT_NUMERIC, SORT_DESC, array_column($equipo, 'average'),SORT_NUMERIC, SORT_DESC, array_keys($equipo), SORT_STRING, $equipo);

foreach ($equipo as $key => $eq) {
    echo "<tr><td>" . $key . "</td>";
    foreach ($eq as $value) {
        echo "<td>" . $value . "</td>";
    }
}    
?>
        </table>
    </body>
</html>