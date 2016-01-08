<<<<<<< HEAD
<?php

include "datosconexion.php";

#conectamos con el servidor y comprobamos la conexión 

$mysqli= new mysqli ($mysql_server, $mysql_login, $mysql_pass);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . 
            $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();
}

$res = $mysqli->query ("SHOW DATABASES");


echo "Las bases de datos son:<br>";

while ($fila = $res->fetch_row())
    echo "$fila[0] <br>";
      
if ($res) $res->free();

# cerramos la conexión con el servidor 

$mysqli->close();  

?>
=======
<?php

include "datosconexion.php";

#conectamos con el servidor y comprobamos la conexión 

$mysqli= new mysqli ($mysql_server, $mysql_login, $mysql_pass);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . 
            $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();
}

$res = $mysqli->query ("SHOW DATABASES");


echo "Las bases de datos son:<br>";

while ($fila = $res->fetch_row())
    echo "$fila[0] <br>";
      
if ($res) $res->free();

# cerramos la conexión con el servidor 

$mysqli->close();  

?>
>>>>>>> d08ca635e88c9439c125812d69e09c071049c5c2
