<<<<<<< HEAD
<html>
    <head>
        <style>
            .centrado{text-align: center;}
        </style>
    </head>
    <body>
        <div class="centrado">
<?php

$anio = $_POST['anio'];
$aux = 0;

if($anio % 4 === 0 &&($anio % 100 !== 0 || $anio % 400 === 0)) {
    echo "El a&ntilde;o es bisiesto";
} else {
    echo "El a&ntilde;o no es bisiesto";
}

if(checkdate(2, 29, $anio)) {
    echo "El a&ntilde;o es bisiesto";
} else {
    while(!checkdate(2, 29, $anio)) {
    $anio++;
    $aux++;
    } 
    echo "<br>Faltan $aux a&ntilde;os para el siguiente"; 
  }
?>
            </div>
    </body>
=======
<html>
    <head>
        <style>
            .centrado{text-align: center;}
        </style>
    </head>
    <body>
        <div class="centrado">
<?php

$anio = $_POST['anio'];
$aux = 0;

if($anio % 4 === 0 &&($anio % 100 !== 0 || $anio % 400 === 0)) {
    echo "El a&ntilde;o es bisiesto";
} else {
    echo "El a&ntilde;o no es bisiesto";
}

if(checkdate(2, 29, $anio)) {
    echo "El a&ntilde;o es bisiesto";
} else {
    while(!checkdate(2, 29, $anio)) {
    $anio++;
    $aux++;
    } 
    echo "<br>Faltan $aux a&ntilde;os para el siguiente"; 
  }
?>
            </div>
    </body>
>>>>>>> d08ca635e88c9439c125812d69e09c071049c5c2
</html>