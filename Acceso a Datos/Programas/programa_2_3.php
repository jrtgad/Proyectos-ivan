<?php

include "datosconexion.php";

$crear="pruebas"; 

$encontrado = false;

#conectamos con el servidor y comprobamos la conexi�n 

$mysqli= new mysqli ($mysql_server, $mysql_login, $mysql_pass);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . 
            $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();
}

$res = $mysqli->query ("SHOW DATABASES");

#comprobamos si existe una base con ese nombre 


while (($fila = $res->fetch_row()) && !$encontrado)
{
    if ($crear == $fila[0])
    {
        echo "Base de datos $crear ya existe<br>";
        $encontrado = true;
    }
}

if ($res) $res->free();

if (!$encontrado) 
    if ($mysqli->query ("CREATE DATABASE $crear"))
        echo "Base de datos $crear creada<br>"; 
          else echo "No ha sido posible crear la base de datos $crear<br>"; 



# cerramos la conexi�n con el servidor 

$mysqli->close()
            
?> 
