<html>
    <head>
        <title>Champions</title>
        <link rel="stylesheet" href="styles/estilos.css">
    </head>
    <body>
        <h1>Máximos goleadores en casa</h1>
        <table>
            
<?php 

$datos = $_POST['datos'];

$equipo = [];

for ($i = 0; $i < count($datos); $i++) {
    $datos = str_replace("_", " ", $datos);
    $equipo[$equipoLocal] = $datos[$i]['eqLoc'];
    $equipo[$equipoVisitante] = $datos[$i]['eqVis'];
}

for ($i = 0; $i < count($datos); $i++) {
    $equipoLocal = $datos[$i]['eqLoc'];
    $equipo[equipoLocal]['golF']     += $datos[$i]['golL'];
    $equipo[$equipoLocal]['golC']     += $datos[$i]['golV'];
    
    if ($equipo[$equipoLocal]['golF'] > $equipo[$equipoLocal]['golC']) {
        $equipo[$equipoLocal]['puntos'] += 3;
    } elseif ($equipo[$equipoLocal]['golF'] < $equipo[$equipoLocal]['golC']) {
        $equipo[$equipoLocal]['puntos'] += 0;
    } else {
        $equipo[$equipoLocal]['puntos'] += 1;
    };
    
    
    
    $equipo[$equipoVisitante] = $datos[$i]['eqVis'];
    $equipo[$equipoVisitante]['golF']      += $datos[$i]['golV'];
    $equipo[$equipoVisitante]['golC']     += $datos[$i]['golL'];
    
    if ($equipo[$equipoVisitante]['golF'] > $equipo[$equipoVisitante]['golC']) {
        $equipo[$equipoVisitante]['puntos'] += 3;
    } elseif ($equipo[$equipoVisitante]['golF'] < $equipo[$equipoVisitante]['golC']) {
        $equipo[$equipoVisitante]['puntos'] += 0;
    } else {
        $equipo[$equipoVisitante]['puntos'] += 1;
    };
}

for ($i = 0; $i < count($equipo); $i++) {
        echo "<tr><td>" . str_replace("_", " ", $datos[$i]['eqLoc']) . "</td><td>" . $golesFavor[$equipoVisitante] . " goles</td></tr>";
}
?>
                </td>
            </tr>
        </table>
    </body>
</html>