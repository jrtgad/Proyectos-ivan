<<<<<<< HEAD
<html>
    <head>
        <style>
            .centrado{text-align: center;
                        width: 100%;}
        </style>
    </head>
    <body>
        <table class="centrado">
<?php
function evaluaArray($arrayNum) {
    $salida= true;
    
    foreach ($arrayNum as $numero) {        
        if($numero <= "9" && $numero >= "0") {
            //No ponemos salida true porque si el último valor 
            //es num, devolverá true siempre
        } else {
            $salida = false;
        }
    }
    return $salida;
}

$numString = $_POST['num'];

//Separamos el string entrante por las comas y quitamos los espacios en blanco
$numVector = explode(",", $numString);

if(evaluaArray($numVector)) {
    //Ordenamos el array
    sort($numVector);

    $distintos = array_unique($numVector);
    
    if(count($distintos) > 2) {
        for($i = 1; $i < (count($numVector) - 1); $i++) {
        //Sacamos todos los valores menos el 1º($i=1) 
        //y el último(count(array)-1)
            echo "<tr><td>", $numVector[$i], "</td></tr>";
        }
    } else {
        echo "<h1>No hay más de 2 números distintos</h1>";
        include("index.php");
    }
    } else {
        echo "<h1>Uno de los valores no es válido</h1>";
        include("index.php");
    }
    
?>
            </table>
    </body>
=======
<html>
    <head>
        <style>
            .centrado{text-align: center;
                        width: 100%;}
        </style>
    </head>
    <body>
        <table class="centrado">
<?php
function evaluaArray($arrayNum) {
    $salida= true;
    
    foreach ($arrayNum as $numero) {        
        if($numero <= "9" && $numero >= "0") {
            //No ponemos salida true porque si el último valor 
            //es num, devolverá true siempre
        } else {
            $salida = false;
        }
    }
    return $salida;
}

$numString = $_POST['num'];

//Separamos el string entrante por las comas y quitamos los espacios en blanco
$numVector = explode(",", $numString);

if(evaluaArray($numVector)) {
    //Ordenamos el array
    sort($numVector);

    $distintos = array_unique($numVector);
    
    if(count($distintos) > 2) {
        for($i = 1; $i < (count($numVector) - 1); $i++) {
        //Sacamos todos los valores menos el 1º($i=1) 
        //y el último(count(array)-1)
            echo "<tr><td>", $numVector[$i], "</td></tr>";
        }
    } else {
        echo "<h1>No hay más de 2 números distintos</h1>";
        include("index.php");
    }
    } else {
        echo "<h1>Uno de los valores no es válido</h1>";
        include("index.php");
    }
    
?>
            </table>
    </body>
>>>>>>> d08ca635e88c9439c125812d69e09c071049c5c2
</html>