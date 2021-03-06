<?php

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
        }
        return $usuario;
    }

    public function __construct($user = null, $pass = null, $rol = null, $id = null) {
        $this->id = $id;
        $this->user = $user;
        $this->pass = $pass;
        $this->partidas = new Collection();
        $this->rol = $rol;
    }

    public function nuevaPartida() {
        $partida = new Partida($this->getId());
        $this->getPartidas()->add($partida);
        $partida->persist();
        return $partida;
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

            //Devuelve las líneas afectadas(0 no ha agregado, 1 si)
            $inserta->execute(array(":user" => $this->getUser(),
                ":pass" => $this->getPass(),
                ":rol" => $this->getRol()));
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

    function getPartidas() {
        return $this->partidas;
    }

    function getRol() {
        return $this->rol;
    }

    function setRol($rol) {
        $this->rol = $rol;
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

    function setPartidas($partidas) {
        $this->partidas = $partidas;
    }

}
