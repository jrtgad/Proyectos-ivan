<<<<<<< HEAD
<?php
# recogemos en una variable el nombre de BASE DE DATOS

$base="ejemplos";

# recogemos en una variable el nombre de la TABLA

$tabla="demo4";

# establecemos la conexion con el servidor

$mysqli= new mysqli ("localhost","php","php");

#asiganamos la conexi�n a una base de datos determinada

$mysqli->select_db($base);

# A�ADIMOS EL NUEVO REGISTRO
$v10='""';

$res=$mysqli->query("INSERT $tabla (DNI,Nombre,Apellido1,Apellido2, Nacimiento,Sexo,Hora,Fumador,Idiomas) VALUES ('1234','Lupicinio','Servidor','Servido','1954-11-23','M','16:24:52',NULL,3)");

#comprobamos el resultado de la insercion
# el error CERO significa NO ERROR
# el error 1062 significa Clave duplicada
# en otros errores forzamos a que nos ponga el n�mero de error
# y el significado de ese error (aunque sea en ingles)....


if ($mysqli->errno==0){echo "<h2>Registro A�ADIDO</b></H2>";
             }else{
		if ($mysqli->errno==1062){echo "<h2>No ha podido a�adirse el registro<br>Ya existe un campo con este DNI</h2>";
			}else{ 
			$numerror=$mysqli->errno;
			$descrerror=$mysqli->error;
			echo "Se ha producido un error n� $numerror que corresponde a: $descrerror  <br>";
		}

}


# cerramos la conexion

 $mysqli->close();

?>

=======
<?php
# recogemos en una variable el nombre de BASE DE DATOS

$base="ejemplos";

# recogemos en una variable el nombre de la TABLA

$tabla="demo4";

# establecemos la conexion con el servidor

$mysqli= new mysqli ("localhost","php","php");

#asiganamos la conexi�n a una base de datos determinada

$mysqli->select_db($base);

# A�ADIMOS EL NUEVO REGISTRO
$v10='""';

$res=$mysqli->query("INSERT $tabla (DNI,Nombre,Apellido1,Apellido2, Nacimiento,Sexo,Hora,Fumador,Idiomas) VALUES ('1234','Lupicinio','Servidor','Servido','1954-11-23','M','16:24:52',NULL,3)");

#comprobamos el resultado de la insercion
# el error CERO significa NO ERROR
# el error 1062 significa Clave duplicada
# en otros errores forzamos a que nos ponga el n�mero de error
# y el significado de ese error (aunque sea en ingles)....


if ($mysqli->errno==0){echo "<h2>Registro A�ADIDO</b></H2>";
             }else{
		if ($mysqli->errno==1062){echo "<h2>No ha podido a�adirse el registro<br>Ya existe un campo con este DNI</h2>";
			}else{ 
			$numerror=$mysqli->errno;
			$descrerror=$mysqli->error;
			echo "Se ha producido un error n� $numerror que corresponde a: $descrerror  <br>";
		}

}


# cerramos la conexion

 $mysqli->close();

?>

>>>>>>> d08ca635e88c9439c125812d69e09c071049c5c2
