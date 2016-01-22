<?php

require_once 'Collection.php';
require_once 'BD.php';

class Jornada {

    private $id;
    private $fecha;
    private $partidos;
    private $state;

    public static function getJornadas() {
        $conexion = BD::getConexion();
        $query = "SELECT * from jornadas";
        $prepara = $conexion->prepare($query);
        $prepara->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Jornada");
        $prepara->execute();
        $conjunto = $prepara->fetchAll();

        $jornadas = new Collection();

        foreach ($conjunto as $jornada) {
            $partidos = Partido::getPartidos($jornada->getId());
            foreach ($partidos as $partido) {
                $jornada->partidos->add($partido);
            }
            $jornadas->add($jornada);
        }
        return $jornadas;
    }

    function persist() {
        if ($this->id === null) {
            $conexion = BD::getConexion();
            $query = "INSERT INTO jornadas (fecha) VALUES(:fecha)";
            $prepara = $conexion->prepare($query);
            $prepara->execute(array(":fecha" => $this->fecha));
            $this->id = $conexion->lastInsertId();
        } else {
            $conexion = BD::getConexion();
            $query = "UPDATE jornadas SET state = :state where id=:id";
            $prepara = $conexion->prepare($query);
            $prepara->execute(array(":state" => $this->getState(),
                ":id" => $this->getId()));
        }
    }

    function __construct($fecha = null, $id = null) {
        $this->id = $id;
        $this->fecha = $fecha;
        $this->partidos = new Collection();
        $this->state = "0";
    }

    function modifica($resultados) {
        $partidos = $this->getPartidos();
        $actual = $partidos->iterate();

        while ($actual) {
            $resultado = $resultados[$actual->getId()];
            $actual->setGolL($resultados[$actual->getId()]['local']);
            $actual->setGolV($resultados[$actual->getId()]['visitante']);
            $actual->persist();
            $actual = $partidos->iterate();
        }
        $this->setState("1");
        $this->persist();
    }

    function borraJornada() {
        $partidos = $this->getPartidos();
        $actual = $partidos->iterate();

        while ($actual) {
            $actual->borra();
            $actual = $partidos->iterate();
        }
        $this->setState("0");
        $this->persist();
    }

    function getId() {
        return $this->id;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getState() {
        return $this->state;
    }

    function setState($state) {
        $this->state = $state;
    }

    function getPartidos() {
        return $this->partidos;
    }

    function setPartidos($partidos) {
        $this->partidos = $partidos;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

}
