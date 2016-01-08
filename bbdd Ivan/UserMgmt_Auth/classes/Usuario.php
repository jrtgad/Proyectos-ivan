
<?php

require_once 'BD.php';

class Usuario {

    protected $id;
    protected $nombre;
    protected $clave;
    
    public static function getByCredencial($nombre, $clave) {
        $bd = BD::getConexion();
        $sql = 'select * from usuarios where nombre=:nombre and clave=:clave';
        $sthSql = $bd->prepare($sql);
        $sthSql->execute([":nombre" => $nombre, ":clave" => $clave]);
        $sthSql->setFetchMode(PDO::FETCH_CLASS, 'Usuario');
        $usuarioObj = $sthSql->fetch();
        return $usuarioObj;
    }
    
    public function __construct() {
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getClave() {
        return $this->clave;
    }
    
    public function setClave($clave) {
        $this->clave = $clave;
    }

    public function persist() {
        $bd = BD::getConexion();
        $sql = "insert into usuarios (nombre, clave) values (:nombre, :clave)";
        $sthSql = $bd->prepare($sqlInsertUsuario);
        $result = $sthSql->execute([":nombre" => $this->nombre, ":clave" => $this->clave]);
        $this->id = (int) $bd->lastInsertId();
    }
}
