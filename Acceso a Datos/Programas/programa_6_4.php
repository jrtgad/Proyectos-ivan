<?php
    include 'cartelera.php';
    
    $peliculas = new SimpleXMLElement($xmlstr);
    $puntuacion = $peliculas->xpath('//pelicula[titulo="PHP: Tras el Parser"]/puntuacion');
   
    foreach ($puntuacion as $punto)
    {
        echo $punto, " ", $punto['tipo'], '<br>';
    }
?>