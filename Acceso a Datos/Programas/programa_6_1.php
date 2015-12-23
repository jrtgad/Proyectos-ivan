<?php
    include 'cartelera.php';
    $peliculas = new SimpleXMLElement($xmlstr);
    echo $peliculas->pelicula[1]->argumento;
?>