<html>
    <head>
        <style>
            .centrado{text-align: center;}
        </style>
    </head>
    <body>
        <div class="centrado">
<?php

function leapYear($year) {
    $bis;
    if($year % 4 === 0 &&($year % 100 !== 0 || $year % 400 === 0)) {
    $bis = true;
    } else {
        $bis = false;
    }
    return $bis;
}

function daysPerMonth($month, $year) {
    switch ($month) {
        case "01": 
        case "03": 
        case "05": 
        case "07": 
        case "08": 
        case "10": 
        case "12": 
            $numberOfDaysPerMonth = "31";            
            break;
        
        case "04": 
        case "06": 
        case "09": 
        case "11": 
            $numberOfDaysPerMonth = "30"; 
            break;
        
        case "02" : 
            leapYear($year) ? $numberOfDaysPerMonth = "29" : $numberOfDaysPerMonth = "28";
            break;
    }
    return $numberOfDaysPerMonth;
}

function daysUntilNextMonth($day, $month, $year) {
    return daysPerMonth($month, $year) - $day;
}

function countDaysUntilNextYear($day, $month, $year) {
    for($i = $month + 1; $i <= 12; $i++) {
        $totalDays += daysPerMonth($i, $year) + daysUntilNextMonth($day, $month, $year);
    }
}



$fecha = $_POST['fecha'];

$fechaArray = explode("/", $fecha);

$day = $fechaArray[0];
$month = $fechaArray[1];
$year = $fechaArray[2];
$numberOfDaysPerMonth;
$totalDays = 0;

$incorrectDate = "La fecha introducida no es correcta";

if(checkdate($month, $day, $year)) {
    $totalDays += (daysUntilNextMonth($day, $month, $year) + 
                    countDaysUntilNextYear($day, $month, $year));
    
} else {
    echo $incorrectDate;
}

?>
        </div>
    </body>
</html>