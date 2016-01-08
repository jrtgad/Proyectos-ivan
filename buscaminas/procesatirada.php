<<<<<<< HEAD
<?php

function generaMinas($minas) {
    $hayMina = true;
    $cont = 1;
    while ($cont < 10) {
        $i = rand(0, 9);
        $j = rand(0, 9);

        if (!checkMines($minas, $i, $j) && $cont < 10) {
            $minas[$i][$j] = "2";
            $cont++;
        }
    }
    return $minas;
}

function checkMines($minas, $i, $j) {
    $haymina = true;
    for ($x = ($i - 1); $x <= ($i + 1); $x++) {
        for ($y = ($j - 1); $y <= ($j + 1); $y++) {
            if (isset($minas[$x][$y])) {
                    $haymina = true;
                    $x = 250;
            } else {
                $haymina = false;
            }
        }
    }
    return $haymina;
}

$tiradas = $_POST['tirada'];
$minas = [];
$resultado = [];

$x = rand(0, 9);
$y = rand(0, 9);
$minas[$x][$y] = "2";
$minas = generaMinas($minas);

for ($i = 0; $i < 10; $i++) {
        for ($j = 0; $j < 10; $j++) {
            if (isset($minas[$i][$j]) && isset($tiradas[$i][$j])) {
                $resultado[$i][$j] = "3";
            } else if(isset ($minas[$i][$j])) {
                $resultado[$i][$j] = "2";
            } else if (isset ($tiradas[$i][$j])) {
                $resultado[$i][$j] = "1";
            }
        }
}
include "vistas/muestraminas.php";
=======
<?php

function generaMinas($minas) {
    $hayMina = true;
    $cont = 1;
    while ($cont < 10) {
        $i = rand(0, 9);
        $j = rand(0, 9);

        if (!checkMines($minas, $i, $j) && $cont < 10) {
            $minas[$i][$j] = "2";
            $cont++;
        }
    }
    return $minas;
}

function checkMines($minas, $i, $j) {
    $haymina = true;
    for ($x = ($i - 1); $x <= ($i + 1); $x++) {
        for ($y = ($j - 1); $y <= ($j + 1); $y++) {
            if (isset($minas[$x][$y])) {
                    $haymina = true;
                    $x = 250;
            } else {
                $haymina = false;
            }
        }
    }
    return $haymina;
}

$tiradas = $_POST['tirada'];
$minas = [];
$resultado = [];

$x = rand(0, 9);
$y = rand(0, 9);
$minas[$x][$y] = "2";
$minas = generaMinas($minas);

for ($i = 0; $i < 10; $i++) {
        for ($j = 0; $j < 10; $j++) {
            if (isset($minas[$i][$j]) && isset($tiradas[$i][$j])) {
                $resultado[$i][$j] = "3";
            } else if(isset ($minas[$i][$j])) {
                $resultado[$i][$j] = "2";
            } else if (isset ($tiradas[$i][$j])) {
                $resultado[$i][$j] = "1";
            }
        }
}
include "vistas/muestraminas.php";
>>>>>>> d08ca635e88c9439c125812d69e09c071049c5c2
?>