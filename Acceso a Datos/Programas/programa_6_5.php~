<?php
    include 'cartelera.php';
    
    $peliculas = new SimpleXMLElement($xmlstr);
    $pelicula = $peliculas->addChild('pelicula');
    $pelicula->addChild('titulo', 'El PHP perdido');
    $personajes = $pelicula->addChild('personajes');
    $personaje1 = $personajes->addChild('personaje');
    $personaje2 = $personajes->addChild('personaje');
    $personaje1->addChild('nombre', 'Indiana PHP');
    $personaje1->addChild('actor', 'Harrison PHP');
    $personaje2->addChild('nombre', 'Sally Rollo');
    $personaje2->addChild('actor', 'Juana Rosa');
    $pelicula->addChild('argumento', 'Indiana Jones busca el PHP perdido por las pirámides egipcias');
    $grandesLineas = $pelicula->addChild('grandes-lineas');
    $grandesLineas->addChild('linea', 'Indiana Jones busca un tesoro');
    $puntuacion1 = $pelicula->addChild('puntuacion', '1');
    $puntuacion2 = $pelicula->addChild('puntuacion', '2');
    $puntuacion1->addAttribute('tipo', 'pulgares');
    $puntuacion2->addAttribute('tipo', 'estrellas');

    echo "<pre>".htmlspecialchars($peliculas->asXML())."</pre>";
?>