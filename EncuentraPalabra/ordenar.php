<?php

/*Ordenar de mayor a menor caracteres 
 y, en caso de ser iguales, alfabeticamente al revés*/

function cmp($a, $b) {
    if((strlen($a) > strlen($b)) || (strlen($a) === strlen($b) && ($a >= $b))) {
        return[1];
    } else {
        return[-1];
    }
}

$palabras = ["panadero", "pescadero", "camionero", "caladero", "paradero", "tostadero"];

$lonPalabras = [];

foreach ($palabras as $palabra) {
    $lonPalabras[] = strlen($palabra);
}

array_multisort($lonPalabras, SORT_DESC, $palabras);

$array = usort($array, "cmp");

foreach ($palabras as $clave => $valor) {
    echo "<p>$clave: $valor\n</p>";
}
?>