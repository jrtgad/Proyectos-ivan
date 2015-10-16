<html>
    <head>
        <title>Champions</title>
        <style>
            table {margin: 0px auto;}
            
            h1 {text-align: center;
                color: blue;}
        </style>
    </head>
    <body>
        <h1>Máximos goleadores en casa</h1>
        <table>
            <tr>
                <td>
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
        echo $datos[$i]['eqLoc'] . " - " . $datos[$i]['golL'] . " goles<br>";
    }
}

/*foreach ($datos as $partido) {
    foreach ($partido as $varGuardada => $valor) {
        if ($varGuardada === "golL" && $valor === $maxGolesLocal) {
            echo $partido['eqLoc'] . " - " . $valor . " goles";
        }
    }
}*/

?>
                </td>
            </tr>
        </table>
    </body>
</html>