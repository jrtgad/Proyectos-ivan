<html>
    <head>
        <title></title>
    </head>
    <body>
<?php 

$datos = $_POST['datos'];
$maxGolesLocal = "0";

for ($i = 0; $i < count($datos); $i++) {
    if($datos[$i]['golL'] > $maxGolesLocal) {
        $maxGolesLocal = $datos[$i]['golL'];
    }
}

foreach ($datos as $partido) {
    foreach ($partido as $key => $valor) {
        if ($key === "golL" && $valor === $maxGolesLocal) {
            echo $valor . " goles";
        }
    }
}

?>
    </body>
</html>