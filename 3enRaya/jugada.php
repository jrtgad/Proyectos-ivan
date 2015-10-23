<?php

function checkWinner($jugada) {
    $aux = "0";
    
    for($i = 0; $i < 9; $i += 3) {
        if (isset($jugada[$i]) && 
            isset($jugada[$i + 1]) &&
            isset($jugada[$i + 2])) {

                if (($jugada[$i] === $jugada[$i + 1] && $jugada[$i] === $jugada[$i + 2]) || 
                    ($jugada[$i] === $jugada[$i + 3] && $jugada[$i] === $jugada[$i + 6])) {
                    $aux = $jugada[$i];
                } else if ($jugada[2] === $jugada[4] && $jugada[2] === $jugada[6]) {
                    $aux = $jugada[2];
                } 
            }
        }
    return $aux;
}

$jugada = $_POST['jugada'];
//var_dump($jugada);

//Lo primero es comprobar si hay algún ganador, en caso de haberlo
//mostraremos la vista correspondiente, sino volvemos a mostrar el tablero
//en la vista continua
if (checkWinner($jugada) === "0") {
    for ($i = 0; $i < 9; $i++) {
        if (!isset($jugada[$i])) {
            $jugada[$i] = "2";
            if (checkWinner($jugada[$i]) === "2") {
                include './vistas/ganacpu.php';
            }
            $i = 11;
        }
    }
    include './vistas/continua.php';
} else if (checkWinner($jugada) === "1") {
    include './vistas/ganajugador.php';
    } else {
        include './vistas/ganacpu.php';
    }
?>