<<<<<<< HEAD
<?php 
include "datosconexion.php";
# introducimos en una variable el nombre de la base de datos a crear 

$crear="practicas";
$encontrado=False;

#conectamos con el servidor y comprobamos la conexión 

$mysqli= new mysqli ($mysql_server, $mysql_login, $mysql_pass);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . 
            $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();
}

$res = $mysqli->query ("SHOW DATABASES");

#comprobamos si existe una base con ese nombre 
# si existe hace la variable comprueba igual a 1 
# si no existe la variable comprueba sera 0 tal como la hemos 
# puesto aquí arriba 

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



# cerramos la conexión con el servidor 

$mysqli->close()
            

?> 
=======
<?php 
include "datosconexion.php";
# introducimos en una variable el nombre de la base de datos a crear 

$crear="practicas";
$encontrado=False;

#conectamos con el servidor y comprobamos la conexión 

$mysqli= new mysqli ($mysql_server, $mysql_login, $mysql_pass);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . 
            $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();
}

$res = $mysqli->query ("SHOW DATABASES");

#comprobamos si existe una base con ese nombre 
# si existe hace la variable comprueba igual a 1 
# si no existe la variable comprueba sera 0 tal como la hemos 
# puesto aquí arriba 

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



# cerramos la conexión con el servidor 

$mysqli->close()
            

?> 
>>>>>>> d08ca635e88c9439c125812d69e09c071049c5c2
