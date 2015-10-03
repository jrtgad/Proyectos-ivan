<html>
    <head>
        <title>Fecha validada</title>
        <style>
            .centrado{text-align: center;}
        </style>
    </head>
    <body>
        <div class="centrado">
<?php

$fecha = explode("-", $_POST['fecha']);

$day = $fecha[0];
$month = $fecha[1];
$year = $fecha[2];

$fechaString = implode("-", $fecha);

checkdate(+$month, +$day, +$year)? $msg = "La fecha $fechaString es correcta" : $msg = "La fecha $fechaString es incorrecta"; include("index.php");

echo "$msg";

?>      
        </div>
    </body>
</html>