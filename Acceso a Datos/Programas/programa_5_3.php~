<<<<<<< HEAD
<?php


    <?php

include "datosconexion.php";

$base="practicas"; 
$tabla="alumnos"; 
#conectamos con el servidor y comprobamos la conexión 

$mysqli= new mysqli ($mysql_server, $mysql_login, $mysql_pass);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . 
            $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();
}


$dni = $_GET['dni'];
$nombre = $_GET['nombre'];
$apellido1 = $_GET['apellido1'];
$apellido2 = $_GET['apellido2'];
$fechaNacimiento = $_GET['fecha_nacimiento'];
$repetidor = $_GET['repetidor'];
    
    


$mysqli->select_db($base);
    
$mysqli->query("INSERT INTO $tabla (dni,nombre,apellido1,apellido2, fecha_nacimiento,repetidor) VALUES ('$dni','$nombre',
'$ape1','$ape2','$fechaNacimiento','$repetidor')");
 
if ($res) echo "El registro se ha anadido correctamente <br>";
    
$mysqli->close();
=======
<?php


    <?php

include "datosconexion.php";

$base="practicas"; 
$tabla="alumnos"; 
#conectamos con el servidor y comprobamos la conexión 

$mysqli= new mysqli ($mysql_server, $mysql_login, $mysql_pass);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . 
            $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();
}


$dni = $_GET['dni'];
$nombre = $_GET['nombre'];
$apellido1 = $_GET['apellido1'];
$apellido2 = $_GET['apellido2'];
$fechaNacimiento = $_GET['fecha_nacimiento'];
$repetidor = $_GET['repetidor'];
    
    


$mysqli->select_db($base);
    
$mysqli->query("INSERT INTO $tabla (dni,nombre,apellido1,apellido2, fecha_nacimiento,repetidor) VALUES ('$dni','$nombre',
'$ape1','$ape2','$fechaNacimiento','$repetidor')");
 
if ($res) echo "El registro se ha anadido correctamente <br>";
    
$mysqli->close();
>>>>>>> d08ca635e88c9439c125812d69e09c071049c5c2
?>