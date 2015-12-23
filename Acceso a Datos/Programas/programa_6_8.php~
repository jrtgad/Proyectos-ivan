<?php
include "datosconexion.php";
$mysqli= new mysqli ($mysql_server, $mysql_login, $mysql_pass);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . 
            $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();
}

$base="practicas"; 
$tabla="alumnos"; 
$mysqli->select_db($base);

$xml = simplexml_load_file("alumnos.xml");


$alumnos = $xml->xpath('//alumno');

foreach ($alumnos as $alumno)
{
    $dni= $alumno->dni;
    $nombre= $alumno->nombre;
    $ap1 = $alumno->apellido1;
    $ap2 = $alumno->apellido2;
    $fnac = $alumno->fnac;
    $rep = $alumno->repetidor;
    $query = "INSERT INTO $tabla (dni,nombre,apellido1,apellido2,fecha_nacimiento,repetidor) 
        VALUES ('$dni','$nombre','$ap1','$ap2','$fnac','$rep')";
    echo $query;
    $res = $mysqli->query("INSERT INTO $tabla (dni,nombre,apellido1,apellido2,fecha_nacimiento,repetidor) 
        VALUES ('$dni','$nombre','$ap1','$ap2','$fnac','$rep')");
    
    if ($res) echo "El alumno con dni ", $dni, " ha sido insertado en la BD <br>";
    else echo "Fallo al insertar el alumno con dni ", $dni, "<br>";
    
}


$mysqli->close();
?>