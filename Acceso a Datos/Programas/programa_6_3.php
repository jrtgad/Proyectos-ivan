<?php
    include 'cartelera.php';
    
    $peliculas = new SimpleXMLElement($xmlstr);
    $actores = $peliculas->xpath('//pelicula[titulo="El PHP perdido"]/personajes/personaje');
   
    foreach ($actores as $actor)
    {
        echo $actor->nombre, '<br>';
    }
?>