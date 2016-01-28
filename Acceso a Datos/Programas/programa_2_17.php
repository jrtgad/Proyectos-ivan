<<<<<<< HEAD
<?php
include "datosconexion.php";
# recogemos en una variable el nombre de BASE DE DATOS

$base="practicas";

# recogemos en una variable el nombre de la TABLA

$tabla="alumnos";

$mysqli= new mysqli ($mysql_server, $mysql_login, $mysql_pass);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" .  $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();
}

$mysqli->select_db($base);
 
$multiconsulta = "SELECT * FROM $tabla WHERE repetidor = 'Si';";
$multiconsulta.= "SELECT * FROM $tabla WHERE dni = '241477185';";
$multiconsulta.= "SELECT dni FROM $tabla WHERE nombre = 'Lupicinia'";

    if($mysqli->multi_query($multiconsulta)) {
        do {
            echo "<table align=center border=2>";
            if ($resultado = $mysqli->store_result()){
                while ($fila = $resultado->fetch_row()) {
                    echo "<tr>";
                    foreach ($fila as $celda) {
                        echo "<td>",$celda,"</td>";
                    }
                }
            }
            echo "<br>";
           $resultado->free();
        } while ($mysqli->more_results() && $mysqli->next_result());
    }
    echo "</table>";

    $mysqli->close(); 
=======
<?php
include "datosconexion.php";
# recogemos en una variable el nombre de BASE DE DATOS

$base="practicas";

# recogemos en una variable el nombre de la TABLA

$tabla="alumnos";

$mysqli= new mysqli ($mysql_server, $mysql_login, $mysql_pass);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" .  $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();
}

$mysqli->select_db($base);
 
$multiconsulta = "SELECT * FROM $tabla WHERE repetidor = 'Si';";
$multiconsulta.= "SELECT * FROM $tabla WHERE dni = '241477185';";
$multiconsulta.= "SELECT dni FROM $tabla WHERE nombre = 'Lupicinia'";

    if($mysqli->multi_query($multiconsulta)) {
        do {
            echo "<table align=center border=2>";
            if ($resultado = $mysqli->store_result()){
                while ($fila = $resultado->fetch_row()) {
                    echo "<tr>";
                    foreach ($fila as $celda) {
                        echo "<td>",$celda,"</td>";
                    }
                }
            }
            echo "<br>";
           $resultado->free();
        } while ($mysqli->more_results() && $mysqli->next_result());
    }
    echo "</table>";

    $mysqli->close(); 
>>>>>>> d08ca635e88c9439c125812d69e09c071049c5c2
?>