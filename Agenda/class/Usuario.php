<?php

    include "Contacto.php";
    include "Collection.php";
    include "BD.php";

    class Usuario {

        private $id;
        private $user;
        private $pass;
        private $contactos;

        function __construct($user = null, $pass = null, $id = null) {
            $this->id = $id;
            $this->user = $user;
            $this->pass = $pass;
            $this->contactos = new Collection();
        }

        public static function getUserByCredentials($user, $pass) {
            $conexion = BD::getConexion();
            $query = "SELECT * FROM usuarios WHERE user=:user AND pass=:pass";
            $result = $conexion->prepare($query);
            $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Usuario");
            $result->execute(array(":user" => $user,
                ":pass" => $pass));
            $usuario = $result->fetch();
            if ($usuario) {
                $contactos = Contacto::getContactosById($usuario->getId());
                $usuario->setContactos($contactos);
            }
            return $usuario;
        }

        public function persist() {
            if ($this->id !== null) {
                $conexion = BD::getConexion();
                $query = "UPDATE usuarios SET user=:user, pass=:pass WHERE id=:id";
                $result = $conexion->prepare($query);
                $result->execute(array(":user" => $this->getUser(),
                    ":pass" => $this->getPass(),
                    ":id" => $this->getId()));
            } else {
                $conexion = BD::getConexion();
                $query = "INSERT INTO usuarios (user,pass) VALUES (:user, :pass)";
                $result = $conexion->prepare($query);
                $result->execute(array(":user" => $this->getUser(),
                    ":pass" => $this->getPass()));
                $this->id = (int) $conexion->lastInsertId();
            }
        }

        public function addContacto($nombre, $apellidos, $tf1, $tf2, $direccion) {
            $contacto = new Contacto($this->getId(), $nombre, $apellidos, $tf1, $tf2, $direccion);
            $this->getContactos()->add($contacto);
            $contacto->persist();
            return $contacto;
        }

        public function removeContact($checkbox) {
            foreach ($checkbox as $id) {
                Contacto::removeById($id);
                $this->getContactos()->removeByProperty("id", $id);
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

        function getContactos() {
            return $this->contactos;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setUser($user) {
            $this->user = $user;
        }

        function setPass($pass) {
            $this->pass = $pass;
        }

        function setContactos($contactos) {
            $this->contactos = $contactos;
        }

    }
