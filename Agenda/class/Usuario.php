<?php

include "Contacto.php";

class Usuario {

    private $id;
    private $user;
    private $pass;
    private $contactos;

    function __construct($id = null, $user = null, $pass = null, $contactos = null) {
        $this->id = $id;
        $this->user = $user;
        $this->pass = $pass;
        $this->contactos = new Collection();
    }

    public static function getUserById($user, $pass) {
        $conexion = BD::getConexion();
        $query = "SELECT * FROM usuario WHERE user=:user AND pass=:pass";
        $result = $conexion->prepare($query);
        $result->setFechMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Usuario");
        $result->execute(array(":user" => $user,
            ":pass=>$pass"));
        $user=$result->fetch();
        if($user) {
            $contactos = Contacto::getContactosById($user->getId());
            $usuario->setContactos($contactos);
        }
        return $user;
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
