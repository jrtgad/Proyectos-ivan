<?php

    require_once 'Collection.php';
    require_once 'BD.php';
    require_once 'Equipo.php';
    require_once 'Jornada.php';
    require_once 'Partido.php';

    class Liga {

        private $id;
        private $jornadas;

        public static function getLiga() {
            return Jornada::getJornadas();
        }

        function __construct($id = null, $jornadas = null) {
            $this->id = $id;
            $this->jornadas = new Collection();
        }

        function generaLiga($equipos) {

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

        function setJornadas($jornadas) {
            $this->jornadas = $jornadas;
        }

    }
