<<<<<<< HEAD
<?php
function checkWinner($jugada) {
    $aux = "0";
    
    //Recorremos las casillas por filas ($i = 0, $i = 1, $i = 2),
    //comprobando si tienen el mismo valor
    for($i = 0; $i < 7; $i += 3) {
        if (isset($jugada[$i]) && isset($jugada[$i + 1]) && isset($jugada[$i + 2])) {
            if ($jugada[$i] === $jugada[$i + 1] && $jugada[$i] === $jugada[$i + 2]) {
                $aux = $jugada[$i];
                $i = 11;
                
                //Comprobamos también las verticales
            } else if (isset($jugada[$i]) && isset($jugada[$i + 3]) && isset($jugada[$i + 6])){
                    if ($jugada[$i] === $jugada[$i + 3] && $jugada[$i] === $jugada[$i + 6]) {
                $aux = $jugada[$i];
                $i = 11;
                    }
                    
                    //y por último las diagonales
                } else if(isset($jugada[2]) && isset($jugada[4]) && isset($jugada[6])) {
                if ($jugada[2] === $jugada[4] && $jugada[2] === $jugada[6]) {
                    $aux = $jugada[2];
                } else if(isset($jugada[0]) && isset($jugada[4]) && isset($jugada[8])) {
                    if ($jugada[0] === $jugada[4] && $jugada[8] === $jugada[0]) {
                        $aux = $jugada[0];
                    }
                }
            }
        }
    }
    return $aux;
}

$jugada = $_POST['jugada'];

//Lo primero es comprobar si ha ganado el jugador, de ser así
//mostraremos la vista correspondiente, 
//sino generamos la jugada de CPU
if (checkWinner($jugada) === "1") {
    include './vistas/ganajugador.php';
} else if (checkWinner($jugada) === "0") {
    for ($i = 0; $i < 9; $i++) {
        if (!isset($jugada[$i])) {
            $jugada[$i] = "2";
            $i = 11;
            }
        }
    }

//Una vez jugado CPU, comprobamos si gana, sino,
//mostramos la vista continua.php para que mueva el jugador
if (checkWinner($jugada) === "2") {
    include './vistas/ganacpu.php';
} else {
    include './vistas/continua.php';
}
=======
<?php
function checkWinner($jugada) {
    $aux = "0";
    
    //Recorremos las casillas por filas ($i = 0, $i = 1, $i = 2),
    //comprobando si tienen el mismo valor
    for($i = 0; $i < 7; $i += 3) {
        if (isset($jugada[$i]) && isset($jugada[$i + 1]) && isset($jugada[$i + 2])) {
            if ($jugada[$i] === $jugada[$i + 1] && $jugada[$i] === $jugada[$i + 2]) {
                $aux = $jugada[$i];
                $i = 11;
                
                //Comprobamos también las verticales
            } else if (isset($jugada[$i]) && isset($jugada[$i + 3]) && isset($jugada[$i + 6])){
                    if ($jugada[$i] === $jugada[$i + 3] && $jugada[$i] === $jugada[$i + 6]) {
                $aux = $jugada[$i];
                $i = 11;
                    }
                    
                    //y por último las diagonales
                } else if(isset($jugada[2]) && isset($jugada[4]) && isset($jugada[6])) {
                if ($jugada[2] === $jugada[4] && $jugada[2] === $jugada[6]) {
                    $aux = $jugada[2];
                } else if(isset($jugada[0]) && isset($jugada[4]) && isset($jugada[8])) {
                    if ($jugada[0] === $jugada[4] && $jugada[8] === $jugada[0]) {
                        $aux = $jugada[0];
                    }
                }
            }
        }
    }
    return $aux;
}

$jugada = $_POST['jugada'];

//Lo primero es comprobar si ha ganado el jugador, de ser así
//mostraremos la vista correspondiente, 
//sino generamos la jugada de CPU
if (checkWinner($jugada) === "1") {
    include './vistas/ganajugador.php';
} else if (checkWinner($jugada) === "0") {
    for ($i = 0; $i < 9; $i++) {
        if (!isset($jugada[$i])) {
            $jugada[$i] = "2";
            $i = 11;
            }
        }
    }

//Una vez jugado CPU, comprobamos si gana, sino,
//mostramos la vista continua.php para que mueva el jugador
if (checkWinner($jugada) === "2") {
    include './vistas/ganacpu.php';
} else {
    include './vistas/continua.php';
}
>>>>>>> d08ca635e88c9439c125812d69e09c071049c5c2
?>