<?php
include "datosconexion.php";

#conectamos con el servidor y comprobamos la conexi�n 

$mysqli= new mysqli ($mysql_server, $mysql_login, $mysql_pass);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . 
            $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();
}

echo "Conexion realizada con exito <br>"

if ($res) $res->free();

# cerramos la conexi�n con el servidor 

if ($mysqli->close()) echo "Conexion cerrada con �xito <br>";
      else echo "Fallo al cerrar la conexion"; 

?> 