<?php

/*
  $intervalo = new DateInterval("P7D");
  $fecha = new DateTime("2014-11-2");



  $fechaPartido = $fecha->format("Y-m-d");
  $fecha->add($intervalo);

  function roundRobin($equipos) {

  if (count($equipos) % 2 != 0) {
  array_push($equipos, "extra!!");
  }
  for ($i = 0; $i < count($equipos) - 1; $i++) {
  $locales = array_slice($equipos, 0, (count($equipos) / 2));
  $visitantes = array_reverse(array_slice($equipos, (count($equipos) / 2)));

  for ($j = 0; $j < count($visitantes); $j++) {
  $liga[$i][$j]['local'] = $locales[$j];
  $liga[$i][$j]['visitante'] = $visitantes[$j];
  }
  $equipoBase = array_shift($equipos);
  array_unshift($equipos, array_pop($equipos));
  array_unshift($equipos, $equipoBase);
  }
  foreach ($liga as $jornada) {
  $jornadaVuelta = [];
  foreach ($jornada as $partido) {
  $partidoVuelta['local'] = $partido['visitante'];
  $partidoVuelta['visitante'] = $partido['local'];
  $jornadaVuelta[] = $partidoVuelta;
  }
  array_push($liga, $jornadaVuelta);
  }
  return $liga;
  }

  $equipos = array('Real Madrid', 'Barcelona FC', 'Sporting Gijon', 'Rayo Vallecano', 'Getafe', 'Sevilla');

  $calendarioLiga = roundRobin($equipos);
  ?>
 */
?>