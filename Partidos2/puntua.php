<<<<<<< HEAD
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
$maxGolesLocal = "0";

for ($i = 0; $i < count($datos); $i++) {
    if($datos[$i]['golL'] > $maxGolesLocal) {
        $maxGolesLocal = $datos[$i]['golL'];
    }
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
=======
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
$maxGolesLocal = "0";

for ($i = 0; $i < count($datos); $i++) {
    if($datos[$i]['golL'] > $maxGolesLocal) {
        $maxGolesLocal = $datos[$i]['golL'];
    }
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
>>>>>>> d08ca635e88c9439c125812d69e09c071049c5c2
</html>