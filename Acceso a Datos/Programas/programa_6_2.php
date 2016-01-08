<<<<<<< HEAD
<?php
    include 'cartelera.php';
    
    $peliculas = new SimpleXMLElement($xmlstr);
    $pelicula = $peliculas->xpath('//pelicula[titulo="PHP: Tras el Parser"]');
    echo $pelicula[0]->personajes->personaje[1]->nombre;
=======
<?php
    include 'cartelera.php';
    
    $peliculas = new SimpleXMLElement($xmlstr);
    $pelicula = $peliculas->xpath('//pelicula[titulo="PHP: Tras el Parser"]');
    echo $pelicula[0]->personajes->personaje[1]->nombre;
>>>>>>> d08ca635e88c9439c125812d69e09c071049c5c2
?>