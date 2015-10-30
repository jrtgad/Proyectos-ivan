<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hundir la flota</title>
        <link rel="stylesheet" href="css/estilo.css">
        <script src="js/imagen.js"></script>
    </head>
    <body>
        <h1>Torpedos disparados</h1>
        <form action="index.php" method="POST">
            <table>
<?php

function genBarcos($size, $dir, $barcos) {
    //$dir es 1 arriba ó 0 lados, se generan para arriba (limite $j = 2)
    $salida = true;
    
    //$j lo usamos para pintar los barcos
    $j = 0;
    
    if ($dir) {
        //Genera las casillas del barco(verticales),
        // si hay alguna definida vuelve a generarlas
        do {
            //Los verticales se generan hacia arriba, luego la última
            //posición para generar es i=2, sino se sale del tablero
            $primera = rand(2, 9) . rand(0, 9);
            
            
            //Comprueba el nº de casillas del barco(3, 2 o 1)
            // para ver si hay barco en esas celdas generadas
            //$i * 10 para que recorra las columnas
            for ($i = 0; $i < $size; $i++) {
                if (isset($barco[$primera - ($i * 10)])) {
                    $i = 10;
                }
            }
            //Si $i coge el valor 10, ya hay barco generado en esa posición
        } while ($i === 10);
        
        do {
            $barcos[$primera - ($j * 10)] = 5;
            $j++;
        } while ($j != $size);
        
    } else {
        do {
            //Los verticales se generan hacia arriba, luego la última
            //posición para generar es i=2, sino se sale del tablero
            $primera = rand(0, 9) . rand(0, 7);
            
            //Comprueba el nº de casillas del barco(3, 2 o 1)
            for ($i = 0; $i < $size; $i++) {
                if (isset($barco[$primera + $i])) {
                    $i = 10;
                }
            }
            //Si $i coge el valor 10, ya hay barco generado en esa posición
        } while ($i === 10);
        
        do {
            $barcos[$primera + ($j)] = 5;
            $j++;
        } while ($j != $size);
    }
return $barcos;
}

if(isset($_POST['tiradas'])){
    $tiradas = $_POST['tiradas'];

    $barcos = [];


    //Generamos los barcos( el de 3, los de 2 y los 3 de 1)
    $barcos = genBarcos(3, rand(0, 1), $barcos);
    $barcos = genBarcos(2, rand(0, 1), $barcos);
    $barcos = genBarcos(2, rand(0, 1), $barcos);
    $barcos = genBarcos(1, rand(0, 1), $barcos);
    $barcos = genBarcos(1, rand(0, 1), $barcos);
    $barcos = genBarcos(1, rand(0, 1), $barcos);


    //Pinta tablero
    for ($i = 0; $i < 10; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 10; $j++){
            echo "<td>";
            if (isset($tiradas[($i . $j)])) {
                if (isset($barcos[($i . $j)])) {
                    echo "*";
                } else {
                    echo "+";
                }
            } else {
                if(isset($barcos[($i . $j)])) {
                    echo "-";
                }
            }
            echo "</td>";
        }
        echo "</tr>";
    }
} else {
    header("Location: index.php");
}
?>
            </table>
            <input type="SUBMIT" value="Volver a jugar">
        </form>
    </body>
</html>