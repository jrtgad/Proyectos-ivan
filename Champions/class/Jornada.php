<?php

class Jornada {

    private $id;
    private $fecha;
    private $partidos;

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

    function __construct($id, $fecha) {
        $this->id = $id;
        $this->fecha = $fecha;
        $this->partidos = new Collection();
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
