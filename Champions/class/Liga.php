<?php

require_once 'Collection.php';
require_once 'BD.php';
require_once 'Equipo.php';
require_once 'Jornada.php';
require_once 'Partido.php';

class Liga {

    private $id;
    private $jornadas;
    private $equipos;

    /* public static function getLiga() {
      return Jornada::getJornadas();
      } */

    function __construct($id = null, $jornadas = null, $equipos = null) {
        $this->id = $id;
        $this->jornadas = new Collection();
        $this->equipos = $equipos;
    }

    function generaLiga($equipos) {

        $this->equipos = $equipos;

        foreach ($equipos as $equipo) {
            $equipo = new Equipo($equipo);
            $equipo->persist();
        }
        //Intervalo entre jornadas y fecha 1ª jornada
        $intervalo = new DateInterval("P7D");
        $fecha = new DateTime("2014-11-2");

        //Por si hay equipos impares
        if (count($equipos) % 2 != 0) {
            array_push($equipos, "extra!!");
        }

        //Genera las jornadas de la 1ª vuelta
        for ($i = 0; $i < count($equipos) - 1; $i++) {

            //Formato fecha
            $fechaPartido = $fecha->format("Y-m-d");

            //Una jornada por cada vuelta del for
            $jornadaActual = new Jornada($fechaPartido);

            //Suma intervalo jornadas
            $fecha->add($intervalo);

            $jornadaActual->persist();

            //Coge del 1º a la mitad
            $locales = array_slice($equipos, 0, (count($equipos) / 2));
            //De la mitad a los que haya
            $visitantes = array_reverse(array_slice($equipos, (count($equipos) / 2)));

            for ($j = 0; $j < count($visitantes); $j++) {
                $partidoActual = new Partido($jornadaActual->getId(), $locales[$j], $visitantes[$j]);

                $partidoActual->persist();

                //En la jornada i, el partido j, el local es j
                $liga[$i][$j]['local'] = $locales[$j];
                $liga[$i][$j]['visitante'] = $visitantes[$j];
            }

            //El 1er equipo
            $equipoBase = array_shift($equipos);
            array_unshift($equipos, array_pop($equipos));
            array_unshift($equipos, $equipoBase);
        }

        //Genera las jornadas de vuelta
        foreach ($liga as $jornada) {
            $fechaPartido = $fecha->format("Y-m-d");

            //Una jornada por cada vuelta del for
            $jornadaActual = new Jornada($fechaPartido);

            //Suma intervalo jornadas
            $fecha->add($intervalo);

            $jornadaActual->persist();

            $jornadaVuelta = [];
            foreach ($jornada as $partido) {

                $partidoActual = new Partido($jornadaActual->getId(), $partido["visitante"], $partido['local']);
                $partidoActual->persist();

                $partidoVuelta['local'] = $partido['visitante'];
                $partidoVuelta['visitante'] = $partido['local'];
                $jornadaVuelta[] = $partidoVuelta;
            }
            array_push($liga, $jornadaVuelta);
        }
        return $liga;
    }

    function getId() {
        return $this->id;
    }

    function getJornadas() {
        return $this->jornadas;
    }

    function setId($id) {
        $this->id = $id;
    }

    function borraJornada($id) {
        //Busca la jornada con id = $id, y es la clase Jornada quien borra los datos
        $jornada = $this->getJornadas()->getByProperty("id", $id);
        $jornada->borraJornada();
    }

    function modificaJornada($id, $resultados) {
        //Busca la jornada con id = $id, y llama a su método modifica
        $jornada = $this->getJornadas()->getByProperty("id", $id);
        $jornada->modifica($resultados);
    }

    function generaClasificacion() {
        //Saca su array de equipos, y calcula, revisando las jornadas,
        // los datos que tiene que mostrar en la tabla
        $equipos = $this->getEquipos();

        foreach ($equipos as $eq) {
            $eq->setPuntos(0);
            $eq->setGolesF(0);
            $eq->setGolesC(0);
        }

        $jornadas = [];
        $actual = $this->getJornadas()->iterate();
        while ($actual) {
            $jornadas[] = $actual;
            $actual = $this->getJornadas()->iterate();
        }

        foreach ($jornadas as $jornada) {
            if ($jornada->getState() === "1") {
                $partidoActual = $jornada->getPartidos()->iterate();

                while ($partidoActual) {
                    foreach ($this->getEquipos() as $equipo) {

                        //$equipo es local
                        if ($partidoActual->getEquipoL() === $equipo->getEquipo()) {
                            $equipo->setGolesF($equipo->getGolesF() + $partidoActual->getGolL());
                            $equipo->setGolesC($equipo->getGolesC() + $partidoActual->getGolV());
                            if ($partidoActual->getGolL() > $partidoActual->getGolV()) {
                                $equipo->setPuntos($equipo->getPuntos() + 3);
                            } else {
                                if ($partidoActual->getGolL() === $partidoActual->getGolV()) {
                                    $equipo->setPuntos($equipo->getPuntos() + 1);
                                }
                            }
                        } else {

                            //$equipo es visitante
                            if ($partidoActual->getEquipoV() === $equipo->getEquipo()) {

                                $equipo->setGolesF($equipo->getGolesF() + $partidoActual->getGolV());
                                $equipo->setGolesC($equipo->getGolesC() + $partidoActual->getGolL());
                                if ($partidoActual->getGolV() > $partidoActual->getGolL()) {
                                    $equipo->setPuntos($equipo->getPuntos() + 3);
                                } else {
                                    if ($partidoActual->getGolL() === $partidoActual->getGolV()) {
                                        $equipo->setPuntos($equipo->getPuntos() + 1);
                                    }
                                }
                            }
                        }
                    }
                    $partidoActual = $jornada->getPartidos()->iterate();
                }
            }
        }
    }

    function setEquipos($equipos) {
        $this->equipos = $equipos;
    }

    function getEquipos() {
        return $this->equipos;
    }

    function setJornadas($jornadas) {
        $this->jornadas = $jornadas;
    }

}
