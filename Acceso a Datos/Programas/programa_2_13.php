<?php

include "datosconexion.php";
# recogemos en una variable el nombre de BASE DE DATOS 

$base="practicas"; 

# recogemos en una variable el nombre de la TABLA 

$tabla="alumnos"; 

#creamos un array con DIEZ NOMBRES 

$nombres=array("Fernando","Generosa","Gonzalo","Servanda","Dorotea","Filiberto","Tiburcio","Lupicinia"); 
$nombres[]="Telesfora";$nombres[]="Ambrosio"; 

#creamos un array con DIEZ PRIMEROS APELLIDOS 

$ape1=array("Alonso","Fernández","Alvarez","Domínguez","García","Rodríguez","Iglesias","Cano"); 
$ape1[]="Barcena";$ape1[]="López"; 

#creamos un array con DIEZ SEGUNDOS APELLIDOS 

$ape2=array("del Rio","del Campo","del Valle","del Monte","de Loriana","de Nora","de Aviles","de Blimea"); 
$ape2[]="de Grado";$ape2[]="de las Asturias"; 

#creamos una variable contador inicializada a cero 
$i=0; 

$registros_anadidos=0;

# establecemos la conexion con el servidor 
$mysqli= new mysqli ($mysql_server, $mysql_login, $mysql_pass);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . 
            $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();
}


#asiganamos la conexión a una base de datos determinada 

$mysqli->select_db($base); 


#creamos un bucle definiendo el número de registros que queremos añadir 
# en este caso 10 

while($i<100){ 
#generamos numeros aleatorios 
#introducimos la semilla del generados 

mt_srand((double)microtime()*1000000); 
# generamos un numero de DNI aleatoriamente 

$v1=mt_rand(1,99999999);
$a=mt_rand(65,90);
$v1.=ord($a);


# elegimos aleatoriamente uno de los 10 nombres del array 
# elegimos el valor entre 0 y 9 porque los indices empiezan en CERO 

$v2=$nombres[mt_rand(0,9)]; 

# elegimos aleatoriamente uno de los 10 primeros apellidos del array 


$v3=$ape1[mt_rand(0,9)]; 


# elegimos aleatoriamente uno de los 10 primeros apellidos del array 

$v4=$ape2[mt_rand(0,9)]; 


# elegimos una fecha aleatoria entee 1-1-1970 (comienzo del tiempo UNIX) 
# y 462837600 que corresponde al 1 de Setiembre de 1984 
# en ese intervalo estará la fecha generada aleatoriamente 
# tomada con formato MySQL año-mes-dia (AAAA-MM-DD) 

$v5=date("Y-m-d",mt_rand(0,462837600)); 



# como el valor del campo repetidor es tipo ENUM solo admite 
# como valores "si" o "no"
# lo generamos así: 

$v6=mt_rand(0,1); 

if ($v6==0){ 
       $v6="SI"; 
     }else{ 
       $v6="NO"; 
} 




$res=$mysqli->query("INSERT $tabla (dni,nombre,apellido1,apellido2, fecha_nacimiento,repetidor) VALUES ('$v1','$v2','$v3','$v4','$v5','$v6')"); 


if ($res) $registros_anadidos++;


if ($mysqli->errno==0){$i++; 
           
} 
#cerramos el bucle while del principio 
} 


# cerramos la conexion 
print "Se han añadido: ".$registros_anadidos ." registros";

$mysqli->close(); 

?> 