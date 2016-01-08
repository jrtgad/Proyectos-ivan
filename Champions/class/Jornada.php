<?php

require_once 'Collection.php';
require_once 'BD.php';

class Jornada {

    private $id;
    private $fecha;
    private $partidos;
    private $state;

    private static function getJornadas() {
        $conexion = BD::getConexion();
        $query = "SELECT * from jornadas";
        $prepara = $conexion->prepare($query);
        $prepara->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Jornada");
        $prepara->execute();
        $conjunto = $prepara->fetchAll();

        $jornadas = new Collection();

        foreach ($conjunto as $jornada) {
            $partido = Partido::getPartidos($jornada->getId());
            $jornada->partidos->add($partido);
            $jornadas->add($jornada);
        }

        return $jornadas;
    }

    function persist() {
        $conexion = BD::getConexion();
        $query = "INSERT INTO jornadas (fecha) VALUES(:fecha)";
        $prepara = $conexion->prepare($query);
        $prepara->execute(array(":fecha" => $this->fecha));
        $this->id = $conexion->lastInsertId();
    }

    function __construct($fecha = null, $id = null) {
        $this->id = $id;
        $this->fecha = $fecha;
        $this->partidos = new Collection();
        $this->state = 0;
    }

    function getId() {
        return $this->id;
    }

    function getFecha() {
        return $this->fecha;
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
