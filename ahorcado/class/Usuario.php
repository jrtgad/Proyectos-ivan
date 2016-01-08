<?php

<<<<<<< HEAD
    require_once 'BD.php';
    require_once 'Partida.php';

    class Usuario {

        private $id_user;
        private $user;
        private $pass;
        private $partidas;
        private $rol;

        public static function getUsuario($user, $pass) {
            $conexion = BD::getConexion();
            $query = "SELECT * from usuarios where user=:user AND pass=:pass";
            $prepara = $conexion->prepare($query);
            $prepara->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Usuario");
            $prepara->execute(array(":user" => $user, ":pass" => $pass));
            $usuario = $prepara->fetch();
            if ($usuario) {
                //$partidas = Partida::getPartidas($usuario->getId());
                //$usuario->setPartidas($partidas);
            }
            return $usuario;
=======
require_once 'BD.php';
require_once 'Partida.php';

class Usuario {

    private $id;
    private $user;
    private $pass;
    private $partidas;
    private $rol;

    public static function getUsuario($user, $pass) {
        $conexion = BD::getConexion();
        $query = "SELECT * from usuarios where user=:user AND pass=:pass";
        $prepara = $conexion->prepare($query);
        $prepara->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Usuario");
        $prepara->execute(array(":user" => $user, ":pass" => $pass));
        $usuario = $prepara->fetch();
        if ($usuario) {
            $partidas = Partida::getPartida($usuario->getId());
            $usuario->setPartidas($partidas);
>>>>>>> 8cc4705eb682705a7796659d1ea5ea81e171d509
        }

<<<<<<< HEAD
        public function __construct($user = null, $pass = null, $rol = null, $id = null) {
            $this->id_user = $id;
            $this->user = $user;
            $this->pass = $pass;
            $this->partidas = new Collection();
            $this->rol = $rol;
        }

        public function nuevaPartida() {
            $partida = new Partida();

            $this->partidas->add($partida);
        }

        public function persist() {
            if ($this->id_user !== null) {
                $conexion = BD::getConexion();
                $query = "UPDATE usuarios SET user=:user, pass=:pass, rol=:rol WHERE id_user = :id_user";
                $update = $conexion->prepare($query);

                //ASSOC trae array asociativo,
                //(por defecto numérico y asociativo)
                $update->setFetchMode(PDO::FETCH_ASSOC);

                //Devuelve las líneas afectadas(0 no ha agregado, 1 si)
                $check = $update->execute(array(":user" => $this->getUser(),
                    ":pass" => $this->getPass(),
                    ":partidas" => $this->getPartidas(),
                    ":rol" => $this->getRol(),
                    ":id_user" => $this->getId()));
                return $check;
            } else {
                $conexion = BD::getConexion();
                $query = "INSERT INTO usuarios (user, pass, rol) "
                        . "VALUES(:user, :pass, :rol)";
                $inserta = $conexion->prepare($query);

                //ASSOC trae array asociativo,
                //(por defecto numérico y asociativo)
                $inserta->setFetchMode(PDO::FETCH_ASSOC);

                //Devuelve las líneas afectadas(0 no ha agregado, 1 si)
                $inserta->execute(array(":user" => $this->getUser(),
                    ":pass" => $this->getPass(),
                    ":rol" => $this->getRol()));
                $this->id_user = (int) $conexion->lastInsertId();
            }
=======
    public function __construct($user = null, $pass = null, $rol = null, $id = null) {
        $this->id = $id;
        $this->user = $user;
        $this->pass = $pass;
        $this->partidas = new Collection();
        $this->rol = $rol;
    }

    public function persist() {
        if ($this->id !== null) {
            $conexion = BD::getConexion();
            $query = "UPDATE usuarios SET user=:user, pass=:pass, rol=:rol WHERE id = :id";
            $update = $conexion->prepare($query);

            //ASSOC trae array asociativo,
            //(por defecto numérico y asociativo)
            $update->setFetchMode(PDO::FETCH_ASSOC);

            //Devuelve las líneas afectadas(0 no ha agregado, 1 si)
            $check = $update->execute(array(":user" => $this->getUser(),
                ":pass" => $this->getPass(),
                ":partidas" => $this->getPartidas(),
                ":rol" => $this->getRol(),
                ":id" => $this->getId()));
            return $check;
        } else {
            $conexion = BD::getConexion();
            $query = "INSERT INTO usuarios (user, pass, rol) "
                    . "VALUES(:user, :pass, :rol)";
            $inserta = $conexion->prepare($query);

            //ASSOC trae array asociativo,
            //(por defecto numérico y asociativo)
            $inserta->setFetchMode(PDO::FETCH_ASSOC);

            //Devuelve las líneas afectadas(0 no ha agregado, 1 si)
            $inserta->execute(array(":user" => $this->getUser(),
                ":pass" => $this->getPass(),
                ":rol" => $this->getRol()));
            $this->id = (int) $conexion->lastInsertId();
>>>>>>> 8cc4705eb682705a7796659d1ea5ea81e171d509
        }

<<<<<<< HEAD
        function getId() {
            return $this->id_user;
        }
=======
    function getId() {
        return $this->id;
    }
>>>>>>> 8cc4705eb682705a7796659d1ea5ea81e171d509

        function getUser() {
            return $this->user;
        }

        function getPass() {
            return $this->pass;
        }

        function getPartidas() {
            return $this->partidas;
        }

        function getRol() {
            return $this->rol;
        }

        function setRol($rol) {
            $this->rol = $rol;
        }

<<<<<<< HEAD
        function setId($id_user) {
            $this->id_user = $id_user;
        }
=======
    function setId($id) {
        $this->id = $id;
    }
>>>>>>> 8cc4705eb682705a7796659d1ea5ea81e171d509

        function setUser($user) {
            $this->user = $user;
        }

        function setPass($pass) {
            $this->pass = $pass;
        }

        function setPartidas($partidas) {
            $this->partidas = $partidas;
        }

    }
