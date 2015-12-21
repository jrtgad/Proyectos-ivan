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

//Para cada partido
foreach ($datos as $partido) {
    //Sacamos la key para comparar
    foreach ($partido as $key => $resultado) {
        //Si la key es golL
        if ($key === "golL") {
            //Comparamos maxGoles y guardamos la mayor
            if ($maxGolesLocal < $resultado) {
                $maxGolesLocal = $resultado;
            }
        }
    }
}

//Mi for cojonudo
/*for ($i = 0; $i < count($datos); $i++) {
    if($datos[$i]['golL'] > $maxGolesLocal) {
        $maxGolesLocal = $datos[$i]['golL'];
    }
}*/

//Imprimir
//$key1 es 0123456
//$partido es $datos[$key1]
foreach ($datos as $key1 => $partido) {
    
    
    //$key es eqLoc golL eqVis golV
    //$resultado es cada uno de los valores(Rm, 9, 0, MU) 
    //$partido[eqLoc] = $resultado
    //$partido[golL] = $resultado
    //$partido[golV] = $resultado
    //$partido[eqVis] = $resultado
    foreach ($partido as $key => $resultado) {
        
        
        //Si la $key es golL
        if ($key === "golL" && $maxGolesLocal === $resultado) {
            //$partido['eqLoc'] cumpliendo la condicion if
            echo $partido['eqLoc'] . " - " . $resultado . "<br>";
        }
        // . " - " . $datos[$i]['golL'] . " goles<br>";
    }
}

/*for ($i = 0; $i < count($datos); $i++) {
    if ($datos[$i]['golL'] === $maxGolesLocal) {
        echo $datos[$i]['eqLoc'] . " - " . $datos[$i]['golL'] . " goles<br>";
    }
}*/
?>
                </td>
            </tr>
        </table>
    </body>
</html>