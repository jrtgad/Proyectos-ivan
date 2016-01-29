<?php

class Contacto {

    private $id;
    private $nombre;
    private $apellidos;
    private $telefono1;
    private $telefono2;
    private $direccion;

    function __construct($id, $nombre, $apellidos, $telefono1, $telefono2, $direccion) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->telefono1 = $telefono1;
        $this->telefono2 = $telefono2;
        $this->direccion = $direccion;
    }

    public static function getContactosById($user) {
        $conexion = BD::getConexion();
        $query = "SELECT * FROM contactos WHERE id=:id";
        $result = $conexion->prepare($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Contacto");
        $result->execute(array(":id" => $user));
        $contactos = $result->fetch();
        return $contactos;
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getTelefono1() {
        return $this->telefono1;
    }

    function getTelefono2() {
        return $this->telefono2;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setTelefono1($telefono1) {
        $this->telefono1 = $telefono1;
    }

    function setTelefono2($telefono2) {
        $this->telefono2 = $telefono2;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

}
