<<<<<<< HEAD
<?php

class BD {

    private $basedatos = 'gestionusuarios';
    private $usuario = 'root';
    private $contrasenya = '';
    private $equipo = 'localhost';
    
    protected static $bd = null;
    private function __construct() {
        try {
            self::$bd = new PDO("mysql:host=$this->equipo;dbname=$this->basedatos", $this->usuario, $this->contrasenya);
        } catch (PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
            die();
        }
    }

    public static function getConexion() {
        if (!self::$bd) {
            new BD();
        }
        return self::$bd;
    }

}
=======
<?php

class BD {

    private $basedatos = 'gestionusuarios';
    private $usuario = 'root';
    private $contrasenya = '';
    private $equipo = 'localhost';
    
    protected static $bd = null;
    private function __construct() {
        try {
            self::$bd = new PDO("mysql:host=$this->equipo;dbname=$this->basedatos", $this->usuario, $this->contrasenya);
        } catch (PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
            die();
        }
    }

    public static function getConexion() {
        if (!self::$bd) {
            new BD();
        }
        return self::$bd;
    }

}
>>>>>>> d08ca635e88c9439c125812d69e09c071049c5c2
