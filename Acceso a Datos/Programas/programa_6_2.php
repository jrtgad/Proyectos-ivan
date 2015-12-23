<?php
    include 'cartelera.php';
    
    $peliculas = new SimpleXMLElement($xmlstr);
    $pelicula = $peliculas->xpath('//pelicula[titulo="PHP: Tras el Parser"]');
    echo $pelicula[0]->personajes->personaje[1]->nombre;
?>