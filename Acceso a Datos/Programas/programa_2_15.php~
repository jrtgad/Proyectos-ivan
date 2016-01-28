<<<<<<< HEAD
<?php

# recogemos en una variable el nombre de BASE DE DATOS

$base="ejemplos";

# recogemos en una variable el nombre de la TABLA

$tabla="demo4";


# establecemos la conexion con el servidor

$mysqli = new mysqli ("localhost","php","php");

#asiganamos la conexión a una base de datos determinada

$mysqli->select_db($base);

# establecemos el criterio de SELECCION
# en este caso los campos Nombre, Apellido1, Apellido2 unicamente

############################################################
############################################################
##        INDICES DE LOS ARRAYS RECOGIDOS EN $REGISTRO    ##
##                                                        ##
##   EN ESTE CASO (consulta de algunos campos             ##
##   LA CORRESPONDENCIA ENTRE INDICE DE ESTE ARRAY        ##
##   ESCALAR Y LOS CAMPOS SERÍAN LA SIGUIENTES:           ##
##   Tendría INDICE 0 el campo Nombre (primero de la      ##
##   consulta. INDICE 1 correspondería a Apellido1        ##
##   el indice 2 correspondería a Apellido 3              ##
##                                                        ##
##   este es el criterio general de asignación de indices ##
############################################################
############################################################

$resultado= $mysqli->query("SELECT Nombre, Apellido1, Apellido2 FROM $tabla");


# CREAMOS UNA CABECERA DE UNA TABLA (codigo HTML)

echo "<table align=center border=2>";

# establecemos un bucle que recoge en un array
# cada una de las LINEAS DEL RESULTADO DE LA CONSULTA
# utilizamos en esta ocasión «mysql_fetch_row»
# en vez de «mysql_fetch_array» para EVITAR DUPLICADOS
# recuerda que esta ultima función devuelve un array escalar
# y otro asociativo con los resultados

while ($registro = $resultado->fetch_row()){
       
       # insertamos un salto de línea en la tabla HTML

       echo "<tr>";

       # establecemos el bucle de lectura del ARRAY
       # con los resultados de cada LINEA
       # y encerramos cada valor en etiquetas <td></td>
       # para que aparezcan en celdas distintas de la tabla

       foreach($registro  as $clave){
       echo "<td>",$clave,"</td>";
 }
}
echo "</table>";


# cerramos la conexion

 $mysqli->close(); 

=======
<?php

# recogemos en una variable el nombre de BASE DE DATOS

$base="ejemplos";

# recogemos en una variable el nombre de la TABLA

$tabla="demo4";


# establecemos la conexion con el servidor

$mysqli = new mysqli ("localhost","php","php");

#asiganamos la conexión a una base de datos determinada

$mysqli->select_db($base);

# establecemos el criterio de SELECCION
# en este caso los campos Nombre, Apellido1, Apellido2 unicamente

############################################################
############################################################
##        INDICES DE LOS ARRAYS RECOGIDOS EN $REGISTRO    ##
##                                                        ##
##   EN ESTE CASO (consulta de algunos campos             ##
##   LA CORRESPONDENCIA ENTRE INDICE DE ESTE ARRAY        ##
##   ESCALAR Y LOS CAMPOS SERÍAN LA SIGUIENTES:           ##
##   Tendría INDICE 0 el campo Nombre (primero de la      ##
##   consulta. INDICE 1 correspondería a Apellido1        ##
##   el indice 2 correspondería a Apellido 3              ##
##                                                        ##
##   este es el criterio general de asignación de indices ##
############################################################
############################################################

$resultado= $mysqli->query("SELECT Nombre, Apellido1, Apellido2 FROM $tabla");


# CREAMOS UNA CABECERA DE UNA TABLA (codigo HTML)

echo "<table align=center border=2>";

# establecemos un bucle que recoge en un array
# cada una de las LINEAS DEL RESULTADO DE LA CONSULTA
# utilizamos en esta ocasión «mysql_fetch_row»
# en vez de «mysql_fetch_array» para EVITAR DUPLICADOS
# recuerda que esta ultima función devuelve un array escalar
# y otro asociativo con los resultados

while ($registro = $resultado->fetch_row()){
       
       # insertamos un salto de línea en la tabla HTML

       echo "<tr>";

       # establecemos el bucle de lectura del ARRAY
       # con los resultados de cada LINEA
       # y encerramos cada valor en etiquetas <td></td>
       # para que aparezcan en celdas distintas de la tabla

       foreach($registro  as $clave){
       echo "<td>",$clave,"</td>";
 }
}
echo "</table>";


# cerramos la conexion

 $mysqli->close(); 

>>>>>>> d08ca635e88c9439c125812d69e09c071049c5c2
?>