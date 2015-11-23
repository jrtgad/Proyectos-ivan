<?php
    require_once 'BD.php';

    class Usuario {
        private $id;
        private $user;
        private $pass;
        private $mail;
        private $pintor;
        
        public static function getUsuario($user, $pass) {
            $conexion = BD::getConexion();
            $query = "SELECT * from usuarios where user=:user AND pass=:pass";
            $prepara = $conexion->prepare($query);
            $prepara->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Usuario");
            $prepara->execute(array(":user"=>$user, ":pass"=>$pass));
            $usuario = $prepara->fetch();
            return $usuario;
        }

        public function __construct($id = null, $user = null, $pass = null, $mail = null, $pintor = null) {
            $this->id = $id;
            $this->user = $user;
            $this->pass = $pass;
            $this->mail = $mail;
            $this->pintor_fk = $pintor;
        }
        
        public function getId() {
            return $this -> id;
        }
        public function setId($id) {
            $this -> $id = $id;
        }
        public function getUser() {
            return $this -> user;
        }
        public function setUser($user) {
            $this -> $user = $user;
        }
        public function getPass() {
            return $this -> pass;
        }
        public function setPass($pass) {
            $this -> pass = $pass;
        }
        public function getMail() {
            return $this -> $mail;
        }
        public function setMail($mail) {
            $this -> mail = $mail;
        }
        public function getPintor() {
            return $this -> pintor_fk;
        }
        public function getNombrePintor() {
            $conexion = BD::getConexion();
            $query = "SELECT nombre FROM pintores where id=:pintor";
            $prepara = $conexion->prepare($query);
            $prepara->setFetchMode(PDO::FETCH_ASSOC);
            $prepara->execute(array(":pintor"=> $this->getPintor()));
            $pintor = $prepara->fetch();
            return $pintor['nombre'];
        }
        public function setPintor($pintor) {
            $this -> pintor = $pintor;
        }
        
        public function registerUser() {
            $conexion = BD::getConexion();
            $query = "INSERT INTO usuarios (user, pass, mail,pintor_fk) "
                   . "VALUES(:user, :pass, :mail, :pintor_fk)";
            $inserta = $conexion->prepare($query);
            $inserta->setFetchMode(PDO::FETCH_ASSOC);
            $inserta->execute(array(":user" => $this->getUser(), 
                                    ":pass" => $this.getPass(),
                                    ":mail" => $this->getMail(),
                                    ":pintor_fk"=>  $this->getPintor()));
            $resumen = $prepara->fetch();
                return $resumen;
        }
    }
?>