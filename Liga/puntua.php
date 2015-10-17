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
$equipoLocal = [];

for ($i = 0; $i < count($datos); $i++) {
    $equipoLocal = $datos[$i]['eqLoc'];
    $golesFavorLocal[$datos[$i]['eqLoc']]      += $datos[$i]['golL'];
    $golesContraLocal[$datos[$i]['eqLoc']]     += $datos[$i]['golV'];
    $golesFavorVisitante[$datos[$i]['eqVis']]  += $datos[$i]['golV'];
    $golesContraVisitante[$datos[$i]['eqVis']] += $datos[$i]['golL'];
}

for ($i = 0; $i < count($datos); $i++) {
    if ($datos[$i]['golL'] === $maxGolesLocal) {
        echo "<tr><td>" . str_replace("_", " ", $datos[$i]['eqLoc']) . " - " . $datos[$i]['golL'] . " goles</td></tr>";
    }
}
?>
                </td>
            </tr>
        </table>
    </body>
</html>