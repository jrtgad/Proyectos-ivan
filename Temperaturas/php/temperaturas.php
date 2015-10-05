<html>
    <head>
        
    </head>
    <body>
<?php

$datos = $_POST['temp'];

foreach ($temps as $ciudad => $meses) {
    foreach ($meses as $mes => $temperaturas) {
        foreach ($temperaturas as $temp => $valor){
            echo "$valor";
        }
    }
}
?>

            </body>
</html>