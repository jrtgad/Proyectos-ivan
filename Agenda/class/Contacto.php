<?php

class Contacto {

    private $id;
    private $nombre;
    private $apellidos;
    private $telefono1;
    private $telefono2;
    private $direccion;
    private $user_id_fk;

    function __construct($nombre = null, $apellidos = null, $telefono1 = null, $telefono2 = null, $direccion = null,$user_id_fk = null, $id = null) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->telefono1 = $telefono1;
        $this->telefono2 = $telefono2;
        $this->direccion = $direccion;
        $this->user_id_fk = $user_id_fk;
        $this->id = $id;
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

    public function persist() {
        $conexion = BD::getConexion();
        $query = "INSERT INTO contactos SET nombre=:nombre, apellidos=:apellidos, telefono1=:telefono1,telefono2=:telefono2, direccion=:direccion, user_id_fk=:user_id_fk";
        $result = $conexion->prepare($query);
        $result->execute(array(":nombre" => $user,
            ":apellidos"=>$this->getApellidos(),
            ":telefono1"=>$this->getTelefono1(),
            ":telefono2"=>$this->getTelefono2(),
            ":direccion"=>$this->getDireccion(),
            ":user_id_fk"=>  $this->getUser_id_fk()));
        $this->id = $conexion->lastInsertId();
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
    function getUser_id_fk() {
        return $this->user_id_fk;
    }

    function setUser_id_fk($user_id_fk) {
        $this->user_id_fk = $user_id_fk;
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
