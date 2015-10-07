<html>
    <head>
        <style>
            .centrado{text-align: center;}
        </style>
    </head>
    <body>

<?php

function checkDaysUntilNextMonth($day, $month, $year) {
    switch ($month) {
        case "01": case "03": case "05": 
        case "07": case "08": case "10": 
        case "12": $numberOfDaysPerMonth = "31";            break;
        
        case "04": case "06": 
        case "09": case "11": $numberOfDaysPerMonth = "30"; break;
        
        case "02" : leapYear($year) ? $numberOfDaysPerMonth = "29" : $numberOfDaysPerMonth = "28";            break;
    }
    return ($numberOfDaysPerMonth - $day);
}

function leapYear($year) {
    $bis;
    if($anio % 4 === 0 &&($anio % 100 !== 0 || $anio % 400 === 0)) {
    $bis = true;
    } else {
        $bis = false;
    }
    return $bis;
}

$fecha = $_POST['fecha'];


$fechaArray = explode("/", $fecha);
$incorrectDate = "La fecha introducida no es correcta";

if(checkdate($month, $day, $year)) {
    $day = $fechaArray[0];
    $month = $fechaArray[1];
    $year = $fechaArray[2];

    $numberOfDaysPerMonth;
    $totalDays = 0;

    $totalDays += checkDaysUntilNextMonth($day, $month, $year);

    checkDaysUntilNextMonth($day, $month, $year);
} else {
    echo $incorrectDate;
}


?>
    </body>
</html>