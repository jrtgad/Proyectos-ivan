<html>
    <head>
        
    </head>
    <body>
<?php

$datos = $_POST['datos'];

foreach ($datos as $ciudad => $meses) {
    foreach ($meses as $mes => $temperaturas) {
        foreach ($temperaturas as $temp => $valor){
            echo "$valor";
        }
    }
}
?>

            </body>
</html>