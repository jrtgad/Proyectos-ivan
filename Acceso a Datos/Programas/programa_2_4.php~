<<<<<<< HEAD
<?php

include "datosconexion.php";

$borrar="pruebas"; 

$encontrado = false;

#conectamos con el servidor y comprobamos la conexión 

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
    if ($borrar == $fila[0])
    {
        if ($mysqli->query ("DROP DATABASE $borrar"))
        	echo "Base de datos $borrar borrada<br>"; 
          	   else echo "No ha sido posible borrar la base de datos $borrar<br>"; 
        $encontrado = true;
    }
}

if ($res) $res->free();

if (!$encontrado) 
    echo "No existe la base de datos $borrar<br>"; 



# cerramos la conexión con el servidor
 
$mysqli->close()
              

?> 
=======
<?php

include "datosconexion.php";

$borrar="pruebas"; 

$encontrado = false;

#conectamos con el servidor y comprobamos la conexión 

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
    if ($borrar == $fila[0])
    {
        if ($mysqli->query ("DROP DATABASE $borrar"))
        	echo "Base de datos $borrar borrada<br>"; 
          	   else echo "No ha sido posible borrar la base de datos $borrar<br>"; 
        $encontrado = true;
    }
}

if ($res) $res->free();

if (!$encontrado) 
    echo "No existe la base de datos $borrar<br>"; 



# cerramos la conexión con el servidor
 
$mysqli->close()
              

?> 
>>>>>>> d08ca635e88c9439c125812d69e09c071049c5c2
