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

$numString = $_POST['num'];

//Separamos el string entrante por las comas y quitamos los espacios en blanco
$numVector = explode(",", trim($numString," "));

//Ordenamos el array
sort($numVector);

//Para cada posición menos la 0 y la última imprimimos el valor
for($i = 1; $i < count($numVector)-1; $i++) {
    echo "<tr><td>", $numVector[$i], "</td></tr>";
}

?>
            </table>
    </body>
</html>