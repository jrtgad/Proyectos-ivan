<?php

$enlace = "../xml/partida.xml";
header("Content-Disposition: attachment; filename=partida.xml");
header("Content-Type: application/xml");
readfile($enlace);
?>