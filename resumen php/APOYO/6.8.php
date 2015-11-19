<?php
    include 'miPeli.php';
    $datos =  new SimpleXMLElement($xmlstr);
    $argument = array();
    $titul = array();
    $actor = array();
    $nombre = array();
    $linea = array();
    $pulgares= array();
    $estrellas = array();
    $cont = 1;
    $cont2= 1;

    $fichero = fopen('peliculas.xml', 'w+');


    while ($cont<=count($titul)){

        foreach  ($datos->xpath("/peliculas/pelicula['$cont']/titulo") as $titulo){   

             $titul[] = $titulo;   
        }
        foreach  ($datos->xpath("/peliculas/pelicula['$cont']/argumento") as $argumento){   

             $argument[] = $argumento;   
        }
        foreach  ($datos->xpath("/peliculas/pelicula['$cont']/personajes/personaje/actor") as $acto){   

             $actor[] = $acto;   
        }
        foreach  ($datos->xpath("/peliculas/pelicula['$cont]!/personaje/nombre") as $nombr){   

             $nombre[] = $nombr;   
        }
        foreach  ($datos->xpath("/peliculas/pelicula['$cont']/linea") as $line){   

             $linea[] = $line;   
        }
        foreach  ($datos->xpath("/peliculas/pelicula['$cont']/puntuacion") as $pulgare){   
            if($pulgare['tipo'] == 'pulgares')
             $pulgares[] = $pulgare;   
            else
              $estrellas[] = $pulgare;
        }
        $pelicula = $datos->addChild('pelicula');
        $pelicula->addChild('titulo', $titul[$cont]);
        $pelicula->addChild('argumento', $arugument[$cont]);

        $personajes = $pelicula->addChild('personajes');
        $personaje  = $personajes->addChild('personaje');

        while($cont2<=count($acto)){
             $personaje->addChild('nombre',$nombre[$cont2]);
             $personaje->addChild('actor', $actor[$cont2]);
             $cont2++;
        }
        $puntuacion = $pelicula->addChild('puntuacion',$estrellas[$cont]);
        $puntuacion->addAttribute('tipo', 'estrellas');
        $puntuacion = $pelicula->addChild('puntuacion',$pulgares[$cont]);
        $puntuacion->addAttribute('tipo', 'puntos');

         $cont++;
    }
    $datos->asXML('peliculas.xml');
?>