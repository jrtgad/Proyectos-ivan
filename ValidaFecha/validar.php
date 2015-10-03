<html>
    <head>
        
    </head>
    <body>
        
<?php

function checkLeapYear($year) {
    if($year % 4 === 0 &&($year % 100 !== 0 || $year % 400 === 0)) {
    return true;
    } else {
        return false;
    }
}

function checkDays($mes, $bisiesto){
    switch ($mes) {
    case "01" :
    case "03" :
    case "05" :
    case "07" :
    case "08" :
    case "10" :
    case "12" :$diasmax = 31;        break;
    case "02" :$diasmax = $bisiesto ? 29 : 28;        break;
    default : $diasmax = 30;        break;
    }
    return $diasmax;
}

$fechaStr = $_POST['date'];

$fecha = explode("-", $fechaStr);

$year = $fecha[2];
$month = $fecha[1];
$days = $fecha[0];
$diasMax = 0;

$leapYear = checkLeapYear($year);

$diasMax = checkDays($month, $leapYear);

if($month > 12 || $month < 1) {
    echo "Revise los meses";
} else {
    if($days > $diasMax) {
        echo "El mes $month no tiene $days d&iacuteas, sino $diasMax";
    } else {
        echo "La fecha es correcta";
    }
}


?>
    </body>
</html>