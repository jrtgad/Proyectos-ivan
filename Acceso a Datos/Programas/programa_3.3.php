<<<<<<< HEAD
<?php 

$puntosequipos = array ("Real Madrid" => 0, "Manchester Utd" => 0, 
    "Milan AC" => 0, "Bayern Munich" => 0);

$ficherores = fopen ("resultados.txt", "r");

$patron = '#([^\d]+)(\d+)\s*-\s*([^\d]+)(\d+)#';
 
 
 while ($res=fgets($ficherores, 400))
 {
  preg_match ($patron, $res, $matches);
  if ((isset ($matches[1])) && (isset ($matches[2])) && (isset ($matches[3])) && (isset ($matches[4])))
  {
      $equipo1 = trim($matches[1]);
      $golesequipo1 = trim($matches[2]);
      $equipo2 = trim($matches[3]);
      $golesequipo2 = trim($matches[4]);
      if ($golesequipo1 > $golesequipo2)
          $puntosequipos[$equipo1]+=3;
          else if ($golesequipo1 < $golesequipo2)
              $puntosequipos[$equipo2]+=3;
                else
                {
                    $puntosequipos[$equipo1]+=1;
                    $puntosequipos[$equipo2]+=1;
                }
  }
  
 }
 
 fclose($ficherores);
  
  $maxpuntos = 0;
  print_r($puntosequipos);
  foreach ($puntosequipos as $equipo => $puntos)
  {
      if ($puntos > $maxpuntos) $ganador = $equipo;
  }
  
  print ("El ganador de la liga es $ganador");
 
=======
<?php 

$puntosequipos = array ("Real Madrid" => 0, "Manchester Utd" => 0, 
    "Milan AC" => 0, "Bayern Munich" => 0);

$ficherores = fopen ("resultados.txt", "r");

$patron = '#([^\d]+)(\d+)\s*-\s*([^\d]+)(\d+)#';
 
 
 while ($res=fgets($ficherores, 400))
 {
  preg_match ($patron, $res, $matches);
  if ((isset ($matches[1])) && (isset ($matches[2])) && (isset ($matches[3])) && (isset ($matches[4])))
  {
      $equipo1 = trim($matches[1]);
      $golesequipo1 = trim($matches[2]);
      $equipo2 = trim($matches[3]);
      $golesequipo2 = trim($matches[4]);
      if ($golesequipo1 > $golesequipo2)
          $puntosequipos[$equipo1]+=3;
          else if ($golesequipo1 < $golesequipo2)
              $puntosequipos[$equipo2]+=3;
                else
                {
                    $puntosequipos[$equipo1]+=1;
                    $puntosequipos[$equipo2]+=1;
                }
  }
  
 }
 
 fclose($ficherores);
  
  $maxpuntos = 0;
  print_r($puntosequipos);
  foreach ($puntosequipos as $equipo => $puntos)
  {
      if ($puntos > $maxpuntos) $ganador = $equipo;
  }
  
  print ("El ganador de la liga es $ganador");
 
>>>>>>> d08ca635e88c9439c125812d69e09c071049c5c2
?> 