<?php
function checkMines($minas, $i,$j) {
    $haymina;
    for ($x = $i - 1; $x <= $i + 1; $x++) {
        for ($j = $minas[$j - 11]; $j <= $minas[$j + 11]; $j++) {
        if (isset($minas[$j])) {
            if ($minas[$j] !== "2") {
                $haymina = true;
                $j = 250;
            } else {
                $haymina = false;
            }
        } else {
            $haymina = false;
        }
    }
    }
    
    return $haymina;
}

function generaMinas($minas) {
    $hayMina = true;
    
    while (count($minas) < 10) {
        $i = rand(0, 9);
        $j = rand(0, 9);
        
        if (checkMines($minas, $i, $j) && (count($minas) < 10)) {
            $minas[$i][$j] = "2";
        }
    }
    
}

$tiradas = $_POST['tirada'];

$minas = [];

$x = rand(0, 9);
$y = rand(0, 9);

$minas[$x][$y] = "2";

$minas = generaMinas($minas);

for ($i = 0; $i < 100; $i++) {
    if ($minas[$i] === $tiradas[$i]) {
        $tiradas[$i] = "3";
        include "vistas/muestraminas.php";
    }
}

?>