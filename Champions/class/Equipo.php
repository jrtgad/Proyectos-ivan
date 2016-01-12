<?php

    class Equipo {

        private $id;
        private $equipo;

        function __construct($equipo = null, $id = null) {
            $this->id = $id;
            $this->equipo = $equipo;
        }

        function persist() {
            $conexion = BD::getConexion();
            $query = "INSERT INTO equipos (equipo) VALUES(:equipo)";
            $prepara = $conexion->prepare($query);
            $prepara->execute(array(":equipo" => $this->equipo));
            $this->id = $conexion->lastInsertId();
        }

        function getId() {
            return $this->id;
        }

        function getEquipo() {
            return $this->equipo;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setEquipo($equipo) {
            $this->equipo = $equipo;
        }

    }
