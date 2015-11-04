<?php

$palabras = explode(",", $_POST['palabras']);
$tablero = $_POST['tablero'];

foreach ($tablero as $datosFila) {
    $stringFila = implode($datosFila);
    foreach ($palabras as $key => $palabra) {
        if ((strpos($stringFila, $palabra)) !== false) {
            $encontrado = true;
            unset($palabras[$key]);
        }
    }
    foreach ($datosFila as $columna => $letra) {
        $stringColumna = implode(array_column($tablero, $columna));  
        foreach ($palabras as $key => $palabra) {
            if ((strpos($stringColumna, $palabra)) !== false) {
                $encontrado = true;
                unset($palabras[$key]);
            }
        }
    }
}
if (empty($palabras)) {
    $msg = "Enhorabuena lo has conseguido";
}
else {
    $msg = "No has colocado las palabras correctamente";
}
include "vistas/resultado.php";
?>
