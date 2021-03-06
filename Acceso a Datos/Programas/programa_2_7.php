<<<<<<< HEAD
<?php
include "datosconexion.php";
/* nos conectamos con el servidor 
recogiendo en $c el identificador de conexi�n */
$mysqli= new mysqli ($mysql_server, $mysql_login, $mysql_pass) or die ("Imposible conectar"); 
# seleccionamos una base de datos existente
# de lo contrario nos dar�a un error
# pondremos como nombre ejemplos nuestra base de datos
# creada en la p�gina anterior y usaremos $c
# importante no olvidarlo
$mysqli->select_db ("ejemplos"); 
/* ahora ya estamos en condiciones de crear la tabla
podr�amos escribir ya la instrucci�n mysql_query y meter
detro la sentencia MySQL pero, por razones de comodidad
crearemos antes una variable que recoja toda la sentencia
y ser� luego cuando la ejecutemos.
Definiremos una varable llamada $crear e iremos a�adiendo cosas */
# la primera parte de la instrucci�n es esta (espacio final incluido
$crear="CREATE TABLE IF NOT EXISTS ";
# a�adiremos el nombre de la tabla que ser� ejemplo1
# fijate en el punto (concatenador de cadenas) que permite
# ir a�adiendo a la cadena anterior
$crear .="ejemplo1 ";
#ahora pongamos el par�ntesis (con un espacio delante)
#aunque el espacio tambi�n podr�a detr�s de ejemplo1 
$crear .="( ";
# insertemos el primer campo y llamemoslo num1
# hagamoslo de tipo TINYINT sin otras especificamos
# sabiendo que solo permitira valores num�ricos 
# comprendidos entre -128 y 127
$crear .="num1 TINYINT , ";
# LOS CAMPOS SE SEPARAN CON COMAS por eso
# la hemos incluido al final de la instrucci�n anterior

# ahora num2 del mismo tipo con dimensi�n 3 y el flag UNSIGNED
# Y ZEROFILL que: cambiar� los l�mites de valores 
# al intervalo 0 - 255, y rellenar� con ceros por la izquierda
# en el caso de que el n�mero de cifras significativas
# sea menor de 3.
# Fijate que los flags van separado unicamente por espacios
$crear .="num2 TINYINT (3) UNSIGNED ZEROFILL,  ";
# en num3 identico al anterior a�adiremos un valor por defecto
# de manera que cuando se a�adan registros a la tabla
# se escriba automaticamente ese valor 13 en el caso
# de que no le asignemos ninguno a ese campo
# por ser num�rico 13 no va entre comillas
$crear .="num3 TINYINT (7) UNSIGNED ZEROFILL DEFAULT 13,  ";
# ahora un n�mero decimal num4  tipo REAL con 8 digitos en total
# de los cuales tres ser�n decimales y tambi�n rellenaremos con ceros
# Pondremos como valor por defecto 3.14
$crear .="num4 REAL (8,3) ZEROFILL DEFAULT 3.14,  ";
# a�adamos una fecha 
$crear .="fecha DATE,  ";
/* una cadena con un limite de 32 car�cter con BINARY
   para que diferencie  Pepe de PEPE */
$crear .="cadena VARCHAR(32) BINARY,  ";
/*  un ultimo campo �opcion� del tipo ENUM que solo admita
   como valores SI, NO, QUIZA 
   fijate en las comillas y en el parentesis
 ��cuidado...!! aqui no ponemos coma al final
 es el �ltimo campo que vamos a insertar y no necesita
 ser separado. Si la pones dar� un ERROR */
$crear .="opcion ENUM('Si','No','Quiza')  ";
# solo nos falta a�adir el par�ntesis conteniendo toda la instrucci�n
$crear .=") Engine=InnoDB";
/* tenemos completa la sentencia MYSQL
   solo falta ejecutarla mediante mysql_query
   ya que la conexi�n est� abierta
   y la base de datos ya est� seleccionada */

/* pongamos un condicional de comprobaci�n */
if($res=$mysqli->query($crear)){
	print "Se ha creado la base de datos<br>";
	print "La sentencia MySQL podr�amos haberla escrito asi:<br>";
	print "query("."\"".$crear."\");";
}else{
    print "Se ha producido un error al crear la tabla";
	 }

         
$mysqli->close();

?>
=======
<?php
include "datosconexion.php";
/* nos conectamos con el servidor 
recogiendo en $c el identificador de conexi�n */
$mysqli= new mysqli ($mysql_server, $mysql_login, $mysql_pass) or die ("Imposible conectar"); 
# seleccionamos una base de datos existente
# de lo contrario nos dar�a un error
# pondremos como nombre ejemplos nuestra base de datos
# creada en la p�gina anterior y usaremos $c
# importante no olvidarlo
$mysqli->select_db ("ejemplos"); 
/* ahora ya estamos en condiciones de crear la tabla
podr�amos escribir ya la instrucci�n mysql_query y meter
detro la sentencia MySQL pero, por razones de comodidad
crearemos antes una variable que recoja toda la sentencia
y ser� luego cuando la ejecutemos.
Definiremos una varable llamada $crear e iremos a�adiendo cosas */
# la primera parte de la instrucci�n es esta (espacio final incluido
$crear="CREATE TABLE IF NOT EXISTS ";
# a�adiremos el nombre de la tabla que ser� ejemplo1
# fijate en el punto (concatenador de cadenas) que permite
# ir a�adiendo a la cadena anterior
$crear .="ejemplo1 ";
#ahora pongamos el par�ntesis (con un espacio delante)
#aunque el espacio tambi�n podr�a detr�s de ejemplo1 
$crear .="( ";
# insertemos el primer campo y llamemoslo num1
# hagamoslo de tipo TINYINT sin otras especificamos
# sabiendo que solo permitira valores num�ricos 
# comprendidos entre -128 y 127
$crear .="num1 TINYINT , ";
# LOS CAMPOS SE SEPARAN CON COMAS por eso
# la hemos incluido al final de la instrucci�n anterior

# ahora num2 del mismo tipo con dimensi�n 3 y el flag UNSIGNED
# Y ZEROFILL que: cambiar� los l�mites de valores 
# al intervalo 0 - 255, y rellenar� con ceros por la izquierda
# en el caso de que el n�mero de cifras significativas
# sea menor de 3.
# Fijate que los flags van separado unicamente por espacios
$crear .="num2 TINYINT (3) UNSIGNED ZEROFILL,  ";
# en num3 identico al anterior a�adiremos un valor por defecto
# de manera que cuando se a�adan registros a la tabla
# se escriba automaticamente ese valor 13 en el caso
# de que no le asignemos ninguno a ese campo
# por ser num�rico 13 no va entre comillas
$crear .="num3 TINYINT (7) UNSIGNED ZEROFILL DEFAULT 13,  ";
# ahora un n�mero decimal num4  tipo REAL con 8 digitos en total
# de los cuales tres ser�n decimales y tambi�n rellenaremos con ceros
# Pondremos como valor por defecto 3.14
$crear .="num4 REAL (8,3) ZEROFILL DEFAULT 3.14,  ";
# a�adamos una fecha 
$crear .="fecha DATE,  ";
/* una cadena con un limite de 32 car�cter con BINARY
   para que diferencie  Pepe de PEPE */
$crear .="cadena VARCHAR(32) BINARY,  ";
/*  un ultimo campo �opcion� del tipo ENUM que solo admita
   como valores SI, NO, QUIZA 
   fijate en las comillas y en el parentesis
 ��cuidado...!! aqui no ponemos coma al final
 es el �ltimo campo que vamos a insertar y no necesita
 ser separado. Si la pones dar� un ERROR */
$crear .="opcion ENUM('Si','No','Quiza')  ";
# solo nos falta a�adir el par�ntesis conteniendo toda la instrucci�n
$crear .=") Engine=InnoDB";
/* tenemos completa la sentencia MYSQL
   solo falta ejecutarla mediante mysql_query
   ya que la conexi�n est� abierta
   y la base de datos ya est� seleccionada */

/* pongamos un condicional de comprobaci�n */
if($res=$mysqli->query($crear)){
	print "Se ha creado la base de datos<br>";
	print "La sentencia MySQL podr�amos haberla escrito asi:<br>";
	print "query("."\"".$crear."\");";
}else{
    print "Se ha producido un error al crear la tabla";
	 }

         
$mysqli->close();

?>
>>>>>>> d08ca635e88c9439c125812d69e09c071049c5c2
