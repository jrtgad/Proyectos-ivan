<<<<<<< HEAD
<?php
    include 'cartelera.php';
    
    $peliculas = new SimpleXMLElement($xmlstr);
    $puntuacion = $peliculas->xpath('//pelicula[titulo="PHP: Tras el Parser"]/puntuacion');
   
    foreach ($puntuacion as $punto)
    {
        echo $punto, " ", $punto['tipo'], '<br>';
    }
=======
<?php
    include 'cartelera.php';
    
    $peliculas = new SimpleXMLElement($xmlstr);
    $puntuacion = $peliculas->xpath('//pelicula[titulo="PHP: Tras el Parser"]/puntuacion');
   
    foreach ($puntuacion as $punto)
    {
        echo $punto, " ", $punto['tipo'], '<br>';
    }
>>>>>>> d08ca635e88c9439c125812d69e09c071049c5c2
?>