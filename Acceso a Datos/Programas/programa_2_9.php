<?php

# insertamos un nombre de tabla imaginaria para evitar riesgos de ejecución
$base="ejemplos"; 
$tabla="prueba1"; 

$borrar="DROP TABLE "; 
$borrar .=$tabla; 

$mysqli= new mysqli ("localhost","php","php"); 
         

$mysqli->select_db ($base); 



if($res=$mysqli->query($borrar)) { 
echo "<h2> Tabla $tabla borrada con EXITO</h2><br>"; 
    }else{ 
echo "<h2> La tabla $tabla NO HA PODIDO BORRARSE</h2><br>"; 
}; 


$mysqli->close(); 
?> 
