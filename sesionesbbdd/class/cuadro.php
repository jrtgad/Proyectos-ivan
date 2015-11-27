<?php
    require_once 'BD.php';

    class Cuadros {
        private $id;
        private $titulo;
        private $imagen;
        private $pintor_fk;
        
        public static function getCuadros($idPintor) {
            $conexion = BD::getConexion();
            $query = "SELECT * from cuadros where pintor_fk = $idPintor";
            $prepara = $conexion->prepare($query);
            
            //No hace falta porque lo voy a recoger todo
            $prepara->setFetchMode(PDO::FETCH_CLASS, "Cuadros");
                                //No hace falta porque no hemos metido variables
            $prepara->execute(/*array[]":pintor"=>$pintor, ":pass"=>$pass)*/);
            $cuadro = $prepara->fetchAll();
            
            //Obj coleccion vacio
            $cuadros = new Collection();
            foreach ($cuadro as $c) {
                
                //Ira metiendo a la coleccion $cuadros cada fila de la tabla cuadros
                $cuadros->add($c);
            }
            return $cuadros;
        }
        
        public static function creaCuadros($idPintor) {
            $conexion = BD::getConexion();
            $query = "SELECT * from cuadros where pintor_fk = ";
            $prepara = $conexion->prepare($query);
            $prepara->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Pintor");
            $prepara->execute(array(":user_fk_pintor"=>$idPintor));
            $cuadros = $prepara->fetch();
            return $cuadros;
        }


        public static function getCuadroAleatorio($idPintor) {
            $conexion = BD::getConexion();
            $query = "SELECT imagen from cuadros where pintor_fk = $idPintor";
            $prepara = $conexion->prepare($query);
            
            //No hace falta porque lo voy a recoger todo
            $prepara->setFetchMode(PDO::FETCH_ASSOC);
                                //No hace falta porque no hemos metido variables
            $prepara->execute(array(/*":pintores.id"=>$idPintor*/));
            $cuadro = $prepara->fetchAll();
            return $cuadro[rand(0, count($cuadro) - 1)]['imagen'];
        }
        
        public function getId() {
            return $this -> id;
        }
        public function setId($id) {
            $this -> id = $id;
        }
        public function getNombre() {
            return $this -> pintor;
        }
        public function setNombre($pintor) {
            $this -> pintor = $pintor;
        }
    }        
?>