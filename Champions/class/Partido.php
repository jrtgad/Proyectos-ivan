<?php

class Partido {

    private $id;
    private $equipoL;
    private $equipoV;
    private $golL;
    private $golV;

    public static function getPartidos($idJor) {
        $conexion = BD::getConexion();
        $query = "SELECT * from partidos where id_jornada = :id_jornada";
        $prepara = $conexion->prepare($query);
        $prepara->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Partido");
        $prepara->execute(array(":id_jornada" => $idJor));
        $conjunto = $prepara->fetchAll();
        $partidosCollection = new Collection();

        foreach ($conjunto as $partidoasasa) {
            $partidosCollection->add($partidoasasa);
        }
        return $partidosCollection;
    }

    function __construct($id, $equipoL, $equipoV, $golL, $golV) {
        $this->id = $id;
        $this->equipoL = $equipoL;
        $this->equipoV = $equipoV;
        $this->golL = $golL;
        $this->golV = $golV;
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
