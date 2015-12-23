<<<<<<< HEAD
<html>
    <head>
        <title>Cuenta art&iacute;culos</title>
        <style>
            h1{text-align: center;}
        </style>
    </head>
    <body>
        <h1>
<?php

function multiExplode($splitters, $text) {
        $texto = str_replace($splitters, $splitters[0], $text);
        return explode($splitters[0], $texto);
    }

$texto = $_POST['texto'];


    $texto = strtolower($texto);
    $articulos = 0;

    //Definimos los token para que, al llegar a ellos, termine la palabra actual
    $token = ", \n\t.:;()[]=-_/\\|";

    //Cogemos la 1ª palabra, que llegará hasta el primer token
    $palabra = strtok($texto, $token);
if(!!$palabra) {
    echo "Escriba algo....";
    include ("index.php");
} else {
    //Si encuentra alguna, sumamos 1 a articulos
    while ($palabra) {
        if($palabra == "el" ||
           $palabra == "la" ||
           $palabra == "los" ||
           $palabra == "las") {
           $articulos += 1;
        }
        //Al terminar de evaluarla, pasamos a la siguiente palabra
        $palabra = strtok($token);
    }

    echo "El texto tiene " . $articulos . " art&iacuteculos";
    include("index.php");
}
?>
            </h1>
    </body>
=======
<html>
    <head>
        <title>Cuenta art&iacute;culos</title>
        <style>
            h1{text-align: center;}
        </style>
    </head>
    <body>
        <h1>
<?php

function multiExplode($splitters, $text) {
        $texto = str_replace($splitters, $splitters[0], $text);
        return explode($splitters[0], $texto);
    }

$texto = $_POST['texto'];


    $texto = strtolower($texto);
    $articulos = 0;

    //Definimos los token para que, al llegar a ellos, termine la palabra actual
    $token = ", \n\t.:;()[]=-_/\\|";

    //Cogemos la 1ª palabra, que llegará hasta el primer token
    $palabra = strtok($texto, $token);
if(!!$palabra) {
    echo "Escriba algo....";
    include ("index.php");
} else {
    //Si encuentra alguna, sumamos 1 a articulos
    while ($palabra) {
        if($palabra == "el" ||
           $palabra == "la" ||
           $palabra == "los" ||
           $palabra == "las") {
           $articulos += 1;
        }
        //Al terminar de evaluarla, pasamos a la siguiente palabra
        $palabra = strtok($token);
    }

    echo "El texto tiene " . $articulos . " art&iacuteculos";
    include("index.php");
}
?>
            </h1>
    </body>
>>>>>>> d08ca635e88c9439c125812d69e09c071049c5c2
</html>