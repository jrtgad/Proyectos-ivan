<?php

$posicion = $_POST['posicion'];
$palabra = $_POST['palabra'];


if($palabra==$posicion){
    echo"<h1>Todo es correcto!</h1>";
    
}
  else{
    echo"<h1>Has fallado alguna palabra</h1>";
   
  }


