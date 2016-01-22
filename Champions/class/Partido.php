<?php

require_once 'BD.php';

class Partido {

    private $id;
    private $equipoL;
    private $equipoV;
    private $golL;
    private $golV;
    private $id_jornada;

    public static function getPartidos($idJor) {
        $conexion = BD::getConexion();
        $query = "SELECT * from partidos where id_jornada = :id_jornada";
        $prepara = $conexion->prepare($query);
        $prepara->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Partido");
        $prepara->execute(array(":id_jornada" => $idJor));
        $conjunto = $prepara->fetchAll();

        return $conjunto;
    }

    function persist() {
        if ($this->id === null) {
            $conexion = BD::getConexion();
            $query = "INSERT INTO partidos (equipoL,equipoV,id_jornada) VALUES(:equipoL,:equipoV,:id_jornada)";
            $prepara = $conexion->prepare($query);
            $prepara->execute(array(":equipoL" => $this->equipoL,
                ":equipoV" => $this->equipoV,
                ":id_jornada" => $this->id_jornada));
            $this->id = $conexion->lastInsertId();
        } else {
            $conexion = BD::getConexion();
            $query = "UPDATE partidos SET golL = :golL, golV=:golV where id = :id";
            $prepara = $conexion->prepare($query);
            $prepara->execute(array(":golL" => $this->golL,
                ":golV" => $this->golV,
                ":id" => $this->id));
        }
    }

    function borra() {
        $this->setGolL(null);
        $this->setGolV(null);
        $this->persist();
    }

    function __construct($id_jornada = null, $equipoL = null, $equipoV = null, $golL = null, $golV = null, $id = null) {
        $this->id = $id;
        $this->equipoL = $equipoL;
        $this->equipoV = $equipoV;
        $this->golL = $golL;
        $this->golV = $golV;
        $this->id_jornada = $id_jornada;
    }

    function getId() {
        return $this->id;
    }

    function getEquipoL() {
        return $this->equipoL;
    }

    function getEquipoV() {
        return $this->equipoV;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setEquipoL($equipoL) {
        $this->equipoL = $equipoL;
    }

    function setEquipoV($equipoV) {
        $this->equipoV = $equipoV;
    }

    function getGolL() {
        return $this->golL;
    }

    function getGolV() {
        return $this->golV;
    }

    function setGolL($golL) {
        $this->golL = $golL;
    }

    function setGolV($golV) {
        $this->golV = $golV;
    }

}
