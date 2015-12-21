<?php
$xml = simplexml_load_file("alumnos.xml");

$alumnos = $xml->xpath('//alumno');

foreach ($alumnos as $alumno)
{
    echo "Alumno:";
    echo "DNI: ", $alumno->dni, "<br>";
    echo "Nombre: ", $alumno->nombre, "<br>";
    echo "Apellido 1: ", $alumno->apellido1, "<br>";
    echo "Apellido 2: ", $alumno->apellido2, "<br>";
    echo "Fecha de nacimiento: ", $alumno->fnac, "<br>";
    echo "Repetidor: ", $alumno->repetidor, "<br><br>";
}
?>