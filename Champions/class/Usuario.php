<?php

    require_once 'BD.php';

    class Usuario {

        private $id;
        private $user;
        private $pass;

        public static function getUsuario($user, $pass) {
            $conexion = BD::getConexion();
            $query = "SELECT * from usuarios where usuario=:user AND pass=:pass";
            $prepara = $conexion->prepare($query);
            $prepara->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Usuario");
            $prepara->execute(array(":user" => $user, ":pass" => $pass));
            $usuario = $prepara->fetch();


            return $usuario;
        }

        public function __construct($user = null, $pass = null, $rol = null, $id = null) {
            $this->id = $id;
            $this->user = $user;
            $this->pass = $pass;
        }

        public function persist() {
            if ($this->id_user !== null) {
                $conexion = BD::getConexion();
                $query = "UPDATE usuarios SET usuario=:user, pass=:pass WHERE id = :id";
                $update = $conexion->prepare($query);

                //ASSOC trae array asociativo,
                //(por defecto numérico y asociativo)
                $update->setFetchMode(PDO::FETCH_ASSOC);

                //Devuelve las líneas afectadas(0 no ha agregado, 1 si)
                $check = $update->execute(array(":user" => $this->getUser(),
                    ":pass" => $this->getPass(),
                    ":id" => $this->getId()));
                return $check;
            } else {
                $conexion = BD::getConexion();
                $query = "INSERT INTO usuarios (user, pass) "
                        . "VALUES(:user, :pass)";
                $inserta = $conexion->prepare($query);

                //ASSOC trae array asociativo,
                //(por defecto numérico y asociativo)
                $inserta->setFetchMode(PDO::FETCH_ASSOC);

                //Devuelve las líneas afectadas(0 no ha agregado, 1 si)
                $inserta->execute(array(":user" => $this->getUser(),
                    ":pass" => $this->getPass()));
                $this->id = (int) $conexion->lastInsertId();
            }
        }

        function getId() {
            return $this->id;
        }

        function getUser() {
            return $this->user;
        }

        function getPass() {
            return $this->pass;
        }

        function setId($id_user) {
            $this->id_user = $id_user;
        }

        function setUser($user) {
            $this->user = $user;
        }

        function setPass($pass) {
            $this->pass = $pass;
        }

    }
