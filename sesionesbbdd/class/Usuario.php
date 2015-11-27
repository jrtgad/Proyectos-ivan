<?php
    require_once 'BD.php';

    class Usuario {
        private $id;
        private $user;
        private $pass;
        private $mail;
        private $pintor_fk;
        
        public static function getUsuario($user, $pass) {
            $conexion = BD::getConexion();
            $query = "SELECT * from usuarios where user=:user AND pass=:pass";
            $prepara = $conexion->prepare($query);
            $prepara->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Usuario");
            $prepara->execute(array(":user"=>$user, ":pass"=>$pass));
            $usuario = $prepara->fetch();
            $usuario->setPintor(Pintor::creaPintor($usuario->getPintor()));
            return $usuario;
        }

        public function __construct($user = null, $mail = null, $pass = null, $pintor = null, $id = null) {
            $this->id = $id;
            $this->user = $user;
            $this->mail = $mail;
            $this->pass = $pass;
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
            return $this -> mail;
        }
        public function setMail($mail) {
            $this -> mail = $mail;
        }
        public function getPintor() {
            return $this -> pintor_fk;
        }
//        public function getNombrePintor() {
//            $conexion = BD::getConexion();
//            $query = "SELECT nombre FROM pintores where id=:pintor";
//            $prepara = $conexion->prepare($query);
//            $prepara->setFetchMode(PDO::FETCH_ASSOC);
//            $prepara->execute(array(":pintor"=> $this->getPintor()));
//            $pintor = $prepara->fetch();
//            return $pintor['nombre'];
//        }
        
        public function setPintor($pintor) {
            $this -> pintor_fk = $pintor;
        }
        
        public function registerUser() {
            $conexion = BD::getConexion();
            $query = "INSERT INTO usuarios (user, pass, mail,pintor_fk) "
                   . "VALUES(:user, :pass, :mail, :pintor_fk)";
            $inserta = $conexion->prepare($query);
            
            //ASSOC trae array asociativo, 
            //(por defecto numérico y asociativo)
            $inserta->setFetchMode(PDO::FETCH_ASSOC);
            
            //Devuelve las líneas afectadas(0 no ha agregado, 1 si)
            return $inserta->execute(array(":user" => $this->getUser(), 
                                    ":pass" => $this->getPass(),
                                    ":mail" => $this->getMail(),
                                    ":pintor_fk"=>  $this->getPintor()));
                        $this->id = (int) $bd->lastInsertId();
        }
        
        //FETCH es para sacar valores
        
        public function deleteUser() {
            $conexion = BD::getConexion();
            $query = "DELETE FROM usuarios where id=:id";
            $prepara = $conexion->prepare($query);
            $prepara->execute(array(":id"=>$this->getId()));
        }
    }
?>