<?php
function calculaCruces($palabra, $nuevaPalabra) {
    $vocal = ["a", "e", "i", "o", "u", "A", "E", "I", "O", "U"];
    $cruces = [0, 0];
    for ($i = 0; $i < strlen($palabra); $i++) {
        for ($j = 0; $j < strlen($nuevaPalabra); $j++) {
            if (!in_array($nuevaPalabra[$j], $vocal)) {
                if ($palabra[$i] === $nuevaPalabra[$j]) {
                    $cruces = [$i, $j];                    
                }
            }
        }
    }
    return $cruces;
}

function compruebaPalabra($tablero, $nuevaPalabra, $filaInicio, $columnaInicio, $direccion) {
    $letra = 0;
    $aux = false;
    while ($letra < strlen($nuevaPalabra)){
        if ($direccion === HORIZONTAL) {
            for ($j = $columnaInicio; $j < ($columnaInicio + strlen($nuevaPalabra)); $j++) {
                if ($tablero[$filaInicio][$j] === "" || $tablero[$filaInicio][$j] === $nuevaPalabra[$letra]) {
                    $aux = true;
                }
                $letra++;
            }
        } else {
            for ($j = $filaInicio; $j < ($filaInicio + strlen($nuevaPalabra)); $j++) {
                if ($tablero[$j][$columnaInicio] === "" || $tablero[$j][$columnaInicio] === $nuevaPalabra[$letra]) {
                    $aux = true;
                }
                $letra++;
            }
        }
    }
    return $aux;
}

function colocaPalabra(&$tablero, $nuevaPalabra, $filaInicio, $columnaInicio, $direccion) {
    $letra = 0;
    
    if ($direccion === HORIZONTAL) {
        for ($j = $columnaInicio; $j < ($columnaInicio + strlen($nuevaPalabra)); $j++) {
                $tablero[$filaInicio][$j] = $nuevaPalabra[$letra];
                $letra++;
        }
    } else {
        for ($j = $filaInicio; $j < ($filaInicio + strlen($nuevaPalabra)); $j++) {
                $tablero[$j][$columnaInicio] = $nuevaPalabra[$letra];
                $letra++;
        }
    }
}


// Lista de palabras
$palabras = ['mesa', 'sarten', 'pescado', 'cartero', 'pintor', 'medico', 'ciempies', 'sotana', 'pan', 'cantero', 'sol', 'luna', 'mapa', 'puerta', 'noticia', 'limon', 'carpa', 'cama'];
// Tamanyo del tablero
define('TAMANYO', 100);
// Representación del tablero
$tablero = array_fill(0, TAMANYO, array_fill(0, TAMANYO, ""));
// Posibles valores que indican la dirección a colocar las palabras
define('HORIZONTAL', 0);
define('VERTICAL', 1);
// Número de palabras a colocar
define('NUMPALABRAS', 4);
// Fila de partida en la colocación de la 1º palabra
define('FILAINICIO', 25);
// Columna de partida en la colocación de la 1º palabra
define('COLUMNAINICIO', 25);
// Palabra de inicio
define('PALABRAINICIO', "****");
// Máximo número de intentos
define('MAXINTENTOS', 1000);
// Lista de palabras ya usadas en el juego
$palabrasUsadas = [];


// Valores iniciales de fila, columna y dirección
$fila = FILAINICIO;
$columna = COLUMNAINICIO;
$direccion = HORIZONTAL;
// Inicializo el valor de palabra inicio
$palabra = PALABRAINICIO;
// Inicializo el contador de palabras y de control de bucle infinito
$numPalabras = 0;
$intentos = 0;
// Mientras no haya colocado el número de palabras deseado y no haya superado
// el máximo de intentos para colocar la siguente palabra
while ($numPalabras < NUMPALABRAS && $intentos < MAXINTENTOS) {
    // Obtengo una palabra al azar del conjunto de palabras
    $nuevaPalabra = $palabras[rand(0, count($palabras) - 1)];
    // Si no se ha utilizado antes
    if (!in_array($nuevaPalabra, $palabrasUsadas)) {
        // Caso especia de la primera palabra. Cruces en 0,0
        if ($palabra === PALABRAINICIO) {
            $cruces = [0, 0];
        } else {
            // Calculo los cruces entre la primera palabra y la última palabra colocada
            $cruces = calculaCruces($palabra, $nuevaPalabra);
        }
        // Intento colocar la nueva palabra en alguna posicion de cruce de las obtenidas
        // anteriormente.
        $colocaPalabra = false;
        while (!empty($cruces) && !$colocaPalabra) {
            // Extraigo el primer elemento de cruces
            $cruce = array_shift($cruces);
            // Calculo el fila y la columna en la que debe colocarse la palabra
            $filaInicio = ($direccion === HORIZONTAL) ? $fila + $cruce[0] : $fila - $cruce[1];
            $columnaInicio = ($direccion === HORIZONTAL) ? $columna - $cruce[1] : $columna + $cruce[0];
            // Si no piso a ninguna otra palabra
            if (compruebaPalabra($tablero, $nuevaPalabra, $filaInicio, $columnaInicio, $direccion)) {
                // Coloco la nueva palabra en el tablero
                colocaPalabra($tablero, $nuevaPalabra, $filaInicio, $columnaInicio, $direccion);
                // Añado la nueva palabra al conjunto de palabras usadas
                $palabrasUsadas[] = $nuevaPalabra;
                // La nueva palabra se convierte en la última palabra colocada
                $palabra = $nuevaPalabra;
                // Actualizo la fila de la última palabra colocada
                $fila = $filaInicio;
                // Actualizo la columna de la última palabra colocada
                $columna = $columnaInicio;
                // Cambio de dirección
                $direccion = ($direccion + 1) % 2;
                // Incremento el número de palabras usadas
                $numPalabras++;
                // Salgo del bucle de colocación de palabra
                $colocaPalabra = true;
            }
        }
    }
    // Incremento intentos
    $intentos++;
}


// El tablero está listo. Crea la vista para enviar al jugador
include "vistas/juego.php";
?>
