<<<<<<< HEAD
<html>
    <head>
        <title>Calcular edad</title>
        <style>
            h1{text-align: center;}
        </style>
    </head>
    <body>
        <h1><?php include("index.php"); ?></h1>
        <h1>
<?php
function LeapYear($year) {
    $bis=false;
    
    if($year % 4 === 0 &&($year % 100 !== 0 || $year % 400 === 0)) {
        $bis = true;
    } else {
        $bis = false;
    }
    return $bis;
}

function monthName($month) {
    
    $name;
    
    switch ($month) {
        case "01":
            $name = "enero";
            break;
            
        case "02":
            $name = "febrero";
            break;
            
        case "03":
            $name = "marzo";
            break;
            
        case "04":
            $name = "abril";
            break;
            
        case "05":
            $name = "mayo";
            break;
            
        case "06":
            $name = "junio";
            break;
            
        case "07":
            $name = "julio";
            break;
        
        case "08":
            $name = "agosto";
            break;
            
        case "09":
            $name = "septiembre";
            break;
            
        case "10":
            $name = "octubre";
            break;
            
        case "11":
            $name = "noviembre";
            break;
        
        case "12" :
            $name = "diciembre";
            break;
    }
    return $name;
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

$fecha = $_POST['fecha'];

$fecha = explode("/", $fecha);

$day   = $fecha[0];
$month = $fecha[1];
$year  = $fecha[2];

$maxDays = daysPerMonth($month, $year);

if ($day > $maxDays) {
    echo "La fecha es incorrecta, " . monthName($month) . " tiene " . $maxDays . " d&iacuteas";
} elseif ($day <= 0) {
    echo "La fecha es incorrecta, los meses tienen d&iacuteas";
    } else {
    
    $actual = getdate();

    $today = $actual['mday'];
    $thisMonth = $actual['mon'];
    $thisYear = $actual['year'];

    $edad = $thisYear - $year;
    $birthday = false;

    if ($year > $thisYear) {
        echo "Todav&iacutea no has nacido?Vuelve a probar...";
    } else {
        if ($month > $thisMonth) {
        $edad = $edad - 1;
        } elseif ($month == $thisMonth && $day > $today) {
            $edad = $edad - 1;
            } elseif ($month == $thisMonth && $day == $today) {
                    $edad = $edad;
                    $birthday = true;
                }
                
        if ($birthday) {
            echo "Felicidades! Has cumplido " . $edad . " a&ntilde;os";
        } else {
            echo "Tienes " . $edad . " a&ntilde;os";
        }
    }
}
?>
        </h1>
    </body>
=======
<html>
    <head>
        <title>Calcular edad</title>
        <style>
            h1{text-align: center;}
        </style>
    </head>
    <body>
        <h1><?php include("index.php"); ?></h1>
        <h1>
<?php
function LeapYear($year) {
    $bis=false;
    
    if($year % 4 === 0 &&($year % 100 !== 0 || $year % 400 === 0)) {
        $bis = true;
    } else {
        $bis = false;
    }
    return $bis;
}

function monthName($month) {
    
    $name;
    
    switch ($month) {
        case "01":
            $name = "enero";
            break;
            
        case "02":
            $name = "febrero";
            break;
            
        case "03":
            $name = "marzo";
            break;
            
        case "04":
            $name = "abril";
            break;
            
        case "05":
            $name = "mayo";
            break;
            
        case "06":
            $name = "junio";
            break;
            
        case "07":
            $name = "julio";
            break;
        
        case "08":
            $name = "agosto";
            break;
            
        case "09":
            $name = "septiembre";
            break;
            
        case "10":
            $name = "octubre";
            break;
            
        case "11":
            $name = "noviembre";
            break;
        
        case "12" :
            $name = "diciembre";
            break;
    }
    return $name;
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

$fecha = $_POST['fecha'];

$fecha = explode("/", $fecha);

$day   = $fecha[0];
$month = $fecha[1];
$year  = $fecha[2];

$maxDays = daysPerMonth($month, $year);

if ($day > $maxDays) {
    echo "La fecha es incorrecta, " . monthName($month) . " tiene " . $maxDays . " d&iacuteas";
} elseif ($day <= 0) {
    echo "La fecha es incorrecta, los meses tienen d&iacuteas";
    } else {
    
    $actual = getdate();

    $today = $actual['mday'];
    $thisMonth = $actual['mon'];
    $thisYear = $actual['year'];

    $edad = $thisYear - $year;
    $birthday = false;

    if ($year > $thisYear) {
        echo "Todav&iacutea no has nacido?Vuelve a probar...";
    } else {
        if ($month > $thisMonth) {
        $edad = $edad - 1;
        } elseif ($month == $thisMonth && $day > $today) {
            $edad = $edad - 1;
            } elseif ($month == $thisMonth && $day == $today) {
                    $edad = $edad;
                    $birthday = true;
                }
                
        if ($birthday) {
            echo "Felicidades! Has cumplido " . $edad . " a&ntilde;os";
        } else {
            echo "Tienes " . $edad . " a&ntilde;os";
        }
    }
}
?>
        </h1>
    </body>
>>>>>>> d08ca635e88c9439c125812d69e09c071049c5c2
</html>