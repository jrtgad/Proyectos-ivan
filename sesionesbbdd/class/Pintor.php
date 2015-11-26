<?php
    require_once 'BD.php';

    class Pintor {
        private $id;
        private $nombre;
        
        public static function getPintor() {
            $conexion = BD::getConexion();
            $query = "SELECT nombre from pintores";
            $prepara = $conexion->prepare($query);
            
            //No hace falta porque lo voy a recoger todo
            /*$prepara->setFetchMode(PDO::FETCH_ASSOC | PDO::FETCH_PROPS_LATE, "Pintor");*/
                                //No hace falta porque no hemos metido variables
            $prepara->execute(/*array[]":pintor"=>$pintor, ":pass"=>$pass)*/);
            $pintor = $prepara->fetchAll();
            return $pintor;
        }

        public function getId() {
            return $this -> id;
        }
        public function setId($id) {
            $this -> $id = $id;
        }
        public function getNombre() {
            return $this -> pintor;
        }
        public function setNombre($pintor) {
            $this -> $pintor = $pintor;
        }
    }        
?>