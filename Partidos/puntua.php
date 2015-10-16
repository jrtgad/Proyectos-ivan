<?php 

$datos = $_POST['datos'];

$local = $datos['local'];
$visitante = $datos['visitante'];
$resultadoLargo = $datos['resultado'];

$goles = explode("-", $resultadoLargo);

$golesLocal = $goles[0];
$golesVisitante = $goles[1];
?>