<?php
function checkMines($minas, $i, $j) {
    $haymina = false;
    for ($x = $i - 1; $x <= $i + 1; $x++) {
        if(isset($minas[$x])) {
            for ($y = $minas[$x][$j - 1]; $y <= $minas[$x][$j + 1]; $y++) {
                if (isset($minas[$x][$y])) {
                    if ($minas[$x][$y] === "2") {
                        $haymina = true;
                        $y = 250;
                    } else {
                        $haymina = false;
                    }
                } else {
                    $haymina = false;
                }
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
        
        if (!checkMines($minas, $i, $j) && (count($minas) < 10)) {
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