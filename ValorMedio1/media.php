<<<<<<< HEAD
<html>
    <head>
        <title>Valor medio</title>
        <style>
            .centrado{text-align: center;}
        </style>
    </head>
    <body>
        <div class="centrado">
<?php

function medio($a, $b, $c) {
    $medio;
    if($a <= $b && $a >= $c) {
        $medio = $a;
    } elseif(($a >= $b && $b >= $c) || ($a <= $b && $b <=$c)) {
            $medio = $b;
        } else {
            $medio = $c;
        }
    return $medio;
}

$num = $_POST['num'];

$numero1 = $num['uno'];
$numero2 = $num['dos'];
$numero3 = $num['tres'];

$valor = medio($numero1, $numero2, $numero3);

/*$numeros = explode(",", $num);

foreach ($numeros as $valor) {
    if(!is_integer($valor)) {
        unset($valor);        
    }
}
array_values($valor);

sort($numeros);*/











/*$num1 = $num['uno'];
$num2 = $num['dos'];
$num3 = $num['tres'];
echo "<div class=\"centrado\">";
if(($num1 > $num2 && $num1 < $num3) || ($num1 < $num2 && $num1 > $num3)) {
    $medio = $num1;
    } else {
            if (($num2 > $num3 && $num2 < $num1) || ($num2 < $num3 && $num2 > $num1)) {
            $medio = $num2;
                } else {
                    $medio = $num3;
                }
            }*/
            
    echo "El valor medio es $valor";
            
?>      </div>
    </body>
=======
<html>
    <head>
        <title>Valor medio</title>
        <style>
            .centrado{text-align: center;}
        </style>
    </head>
    <body>
        <div class="centrado">
<?php

function medio($a, $b, $c) {
    $medio;
    if($a <= $b && $a >= $c) {
        $medio = $a;
    } elseif(($a >= $b && $b >= $c) || ($a <= $b && $b <=$c)) {
            $medio = $b;
        } else {
            $medio = $c;
        }
    return $medio;
}

$num = $_POST['num'];

$numero1 = $num['uno'];
$numero2 = $num['dos'];
$numero3 = $num['tres'];

$valor = medio($numero1, $numero2, $numero3);

/*$numeros = explode(",", $num);

foreach ($numeros as $valor) {
    if(!is_integer($valor)) {
        unset($valor);        
    }
}
array_values($valor);

sort($numeros);*/











/*$num1 = $num['uno'];
$num2 = $num['dos'];
$num3 = $num['tres'];
echo "<div class=\"centrado\">";
if(($num1 > $num2 && $num1 < $num3) || ($num1 < $num2 && $num1 > $num3)) {
    $medio = $num1;
    } else {
            if (($num2 > $num3 && $num2 < $num1) || ($num2 < $num3 && $num2 > $num1)) {
            $medio = $num2;
                } else {
                    $medio = $num3;
                }
            }*/
            
    echo "El valor medio es $valor";
            
?>      </div>
    </body>
>>>>>>> d08ca635e88c9439c125812d69e09c071049c5c2
</html>