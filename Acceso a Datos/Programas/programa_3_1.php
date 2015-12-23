<<<<<<< HEAD
<?php
    $fichero=fopen("fecha.txt","w");
    $hora = date("h:i:s");
    $fecha = date("j-n-Y");
    fwrite($fichero, "Fecha: $fecha y Hora: $hora");
    fclose($f1);
=======
<?php
    $fichero=fopen("fecha.txt","w");
    $hora = date("h:i:s");
    $fecha = date("j-n-Y");
    fwrite($fichero, "Fecha: $fecha y Hora: $hora");
    fclose($f1);
>>>>>>> d08ca635e88c9439c125812d69e09c071049c5c2
?>