<?php
    $palabras = ["mesa", "sarten", "pescado", "pintor", "cartero", 
                 "medico", "ciempies", "sotana", "pan", "cantero", 
                 "sol", "luna", "mapa", "puerta"];
    
    $elegidas = [];
    function aleatorias($palabras) {
        //Aleatorizamos el array para coger 4 palabras al azar
        shuffle($palabras);
    
        //Metemos las palabras en el array
        for ($i = 0; $i < 4; $i++) {
            $elegidas[$i] = $palabras[$i];
        }
        return $elegidas;
    }
    
    function letrasPalabra($anterior, $actual, $pos) {
        $encontrada = [false, 0, 0];
        for ($i = $pos + 2; $i < strlen($anterior); $i += 1) {
            if (!in_array($anterior[$i], ["a", "e", "i", "o", "u"])) {
                if (strpos($actual, $anterior[$i])) {
                    $encontrada = [true, $i, strpos($actual, $anterior[$i])];
                    $i = 200;
                }
            }
        }
        return $encontrada;
    }
    
    do {
        $elegidas = aleatorias($palabras);
        $valida = true;
        
        $posiciones[0] = [true, 0, 0];
    
        for ($i = 0; $i < count($elegidas); $i += 1) {
            for ($j = 0; $j < strlen($elegidas[$i]); $j++) {
                if (isset($elegidas[$i - 1])) {
                    $posiciones[$i] = letrasPalabra($elegidas[$i - 1], $elegidas[$i], $posiciones[$i - 1][2]);
                    if (!$posiciones[$i][0]) {
                        $valida = false;
                    }
                }
            }
        }
    } while (!$valida);
 

    
    var_dump($posiciones);
    var_dump($elegidas);
    include "vistas/bienvenida.php";
?>