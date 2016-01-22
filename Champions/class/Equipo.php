<?php

    class Equipo {

        private $id;
        private $equipo;
        private $puntos;
        private $golesF;
        private $golesC;

        function __construct($equipo = null, $id = null, $puntos = null, $golesF = null, $golesC = null) {
            $this->id = $id;
            $this->equipo = $equipo;
            $this->puntos = $puntos;
            $this->golesF = $golesF;
            $this->golesC = $golesC;
        }

        function persist() {
            $conexion = BD::getConexion();
            $query = "INSERT INTO equipos (equipo) VALUES(:equipo)";
            $prepara = $conexion->prepare($query);
            $prepara->execute(array(":equipo" => $this->equipo));
            $this->id = $conexion->lastInsertId();
        }

        static function getEquipos() {
            $conexion = BD::getConexion();
            $query = "SELECT * from equipos";
            $prepara = $conexion->prepare($query);
            $prepara->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Equipo");
            $prepara->execute();
            return $prepara->fetchAll();
        }

        function getId() {
            return $this->id;
        }

        function getEquipo() {
            return $this->equipo;
        }

        function getPuntos() {
            return $this->puntos;
        }

        function getGolesF() {
            return $this->golesF;
        }

        function getGolesC() {
            return $this->golesC;
        }

        function setPuntos($puntos) {
            $this->puntos = $puntos;
        }

        function setGolesF($golesF) {
            $this->golesF = $golesF;
        }

        function setGolesC($golesC) {
            $this->golesC = $golesC;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setEquipo($equipo) {
            $this->equipo = $equipo;
        }

    }
