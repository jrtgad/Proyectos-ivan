<html>
    <head>
        
    </head>
    <body>
<?php

$temps = $_POST['temp'];

$ciudades = $temps['ciudad'];
$meses = $temps['ciudad']['mes'];
$temperaturas = $temps['ciudad']['mes']['temperaturas'];
    
foreach ($ciudades as $ciudad => $mes) {
    echo "$ciudad elll $mes";
}



?>

            </body>
</html>