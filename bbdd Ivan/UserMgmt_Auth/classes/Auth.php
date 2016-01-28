
<?php

class Auth {
    
    public function logout(){
        session_unset();
        session_destroy();
    }
    
    public function login($usuario) {
        $_SESSION['usuario'] = $usuario;
    }
    
    public function usuario() {
        return $_SESSION['usuario'];
    }
    
    public function check() {
        return (isset($_SESSION['usuario']));
    }
    
    public function __construct() {
    }

    public function getId() {
        return $this->id;
    }

    public function getNomUsuario() {
        return $this->nomUsuario;
    }

    public function setNomUsuario($nomUsuario) {
        $this->nomUsuario = $nomUsuario;
    }

    public function getClave() {
        return $this->clave;
    }
    
    public function setClave($clave) {
        $this->clave = $clave;
    }

    public function persist() {
        $bd = BD::getConexion();
        $sqlInsertUsuario = "insert into usuarios (nomUsuario, clave) values (:nomUsuario, :clave)";
        $sthSqlInsertUsuario = $bd->prepare($sqlInsertUsuario);
        $result = $sthSqlInsertUsuario->execute([":nomUsuario" => $this->nomUsuario, ":clave" => $this->clave]);
        $this->id = (int) $bd->lastInsertId();
    }
}
