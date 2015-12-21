<?php

$VOCALES = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");
$NUM_PALABRAS = 4;

do {
    generarPalabras($palabraelegida, $coincidencias,$palabras);
    $tabla = crearTabla($palabraelegida, $coincidencias);
} while ($tabla == false);

function generarPalabras(&$palabraelegida, &$coincidencias, $palabras) {
    global $VOCALES,
           $NUM_PALABRAS;
    shuffle($palabras);
    $palabrasrestantes = $palabras;
    $palabraelegida = [$palabras[0]];
    unset($palabrasrestantes[0]);
    $palabraconsonantes = str_replace($VOCALES, "", $palabraelegida[0]);

    $coincidencias = [];
    while (count($palabraelegida) < $NUM_PALABRAS) {
        $found = false;
        for ($i = 0; $i < strlen($palabraconsonantes) && !$found; $i++) {
            $c = $palabraconsonantes[$i];
            foreach ($palabrasrestantes as $key => $value) {

                if (strpos($value, $c) !== false) {
                    array_push($palabraelegida, $value);
                    $palabraconsonantes = str_replace($c, "", str_replace($VOCALES, "", $value));
                    array_push($coincidencias, $c);
                    unset($palabrasrestantes[$key]);
                    $found = true;
                    break;
                }
            }
        }
        //si no encuentra $found==false volver a empezar
        if ($found == false) {
            shuffle($palabras);
            $palabrasrestantes = $palabras;
            $palabraelegida = [$palabras[0]];
            unset($palabrasrestantes[0]);
            $palabraconsonantes = str_replace($VOCALES, "", $palabraelegida[0]);
            $coincidencias = [];
        }
    }
}

function crearTabla($palabras, $coincidencias) {

    global $NUM_PALABRAS;
    $tabla = [];
    $posA = 0;
    $posB = 0;
    for ($i = 0; $i < $NUM_PALABRAS; $i++) {
        $length = strlen($palabras[$i]);
        for ($j = 0; $j < $length; $j++) {
            // la posicion de $j caracter q se va a inroducir
            $pos = $j - $posB;
            if ($i % 2 == 0) {
                //Si ya existe un valor anterior 
                if (isset($tabla[40 + $posA][40 + $pos])) {
                    //Si el valor es diferente al que voy a introducir
                    if ($tabla[40 + $posA][40 + $pos] != $palabras[$i][$j]) {
                       
                        return false;
                    }
                } else {
                    $tabla[40 + $posA][40 + $pos] = $palabras[$i][$j];
                }
            } else {
                if (isset($tabla[40 + $pos][40 + $posA])) {
                    if ($tabla[40 + $pos][40 + $posA] != $palabras[$i][$j]) {
                        return false;
                    }
                } else {
                    $tabla[40 + $pos][40 + $posA] = $palabras[$i][$j];
                }
            }
        }
        if ($i != ($NUM_PALABRAS-1)) {
            $aux = $posA;
            //arrastro la posicion anterior porque ya no es 0,0
            //posA posicion de la interseccion con la palabra actual(se mantiene fija para la siguiente palabra)
            $posA = strpos($palabras[$i], $coincidencias[$i]) - $posB;
            //posB posicion de la interseccion con siguiente palabra(La palabra($j - $posB) Empezara en 0 -posB)
            $posB = strpos($palabras[$i + 1], $coincidencias[$i]) - $aux;
        }
    }
    return $tabla;
}

echo "<table>";
for ($f = 0; $f < 80; $f++) {
    echo "<tr>";
    for ($c = 0; $c < 80; $c++) {
        echo "<td>";

        if (isset($tabla[$f][$c])) {
            echo "<input id='nombre' type='text' value='".$tabla[$f][$c]."' name='posicion[$f][$c]' size='2' />";
            //echo "<input id='nombre' type='text' value='' name='posicion[$f][$c]' size='2' />";
            echo "<input id='nombre' type='hidden' value='" . $tabla[$f][$c] . "' name='palabra[$f][$c]' size='2' />";
        }
        echo "</td>";
    }
    echo "<t/r>";
}

echo "</table>";

foreach($palabraelegida as $palabra){
    echo "- $palabra<br>";
}
