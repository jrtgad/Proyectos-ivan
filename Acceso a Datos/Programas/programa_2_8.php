<?php

include "datosconexion.php";

$mysqli= new mysqli ($mysql_server, $mysql_login, $mysql_pass);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . 
            $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();
}


    $mysqli->select_db ("practicas");
    
    $creartabla = "CREATE TABLE IF NOT EXISTS ";
    $creartabla .="alumnos";
    $creartabla .="( ";
    $creartabla .="dni VARCHAR (9), ";
    $creartabla .="nombre VARCHAR (20) ,  ";
    $creartabla .="apellido1 VARCHAR (20) ,  ";
    $creartabla .="apellido2 VARCHAR (20) ,  ";
    $creartabla .="fecha_nacimiento DATE,  ";
    $creartabla .="repetidor ENUM('Si','No')  ";
    $creartabla .=") " ;
    
    
    if ($res=$mysqli->query ($creartabla)){ 
        print "Se ha creado la tabla<br>";
    } else { 
        echo "No ha sido posible crear la tabla $creartabla<br>"; 
    }


$mysqli->close();


?>
