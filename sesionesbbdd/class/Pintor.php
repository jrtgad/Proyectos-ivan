<?php

require_once 'BD.php';
require_once 'Cuadros.php';
require_once 'Collection.php';

class Pintor {

    private $id;
    private $nombre;
    private $colection;

    public function __construct($nombre = null, $id = null) {
        $this->id = $id;
        $this->nombre = $nombre;
    }

    public static function creaPintor($idPintor) {
        $conexion = BD::getConexion();
        $query = "SELECT * from pintores where id=:user_fk_pintor";
        $prepara = $conexion->prepare($query);
        $prepara->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Pintor");
        $prepara->execute(array(":user_fk_pintor" => $idPintor));
        $pintor = $prepara->fetch();
        $pintor->setColection(Cuadros::creaCuadros($pintor->getId()));
        return $pintor;
    }

    public static function getPintores() {
        $conexion = BD::getConexion();
        $query = "SELECT * from pintores";
        $prepara = $conexion->prepare($query);

        //No hace falta porque lo voy a recoger todo
        $prepara->setFetchMode(PDO::FETCH_ASSOC | PDO::FETCH_PROPS_LATE, "Pintor");
        //No hace falta porque no hemos metido variables
        $prepara->execute(array(":pintor" => $pintor, ":pass" => $pass));
        $pintor = $prepara->fetchAll();
        return $pintor;
    }

    public static function getCuadros() {
        $conexion = BD::getConexion();
        $query = "SELECT * from cuadros where pintor_fk = $this->getId()";
        $prepara = $conexion->prepare($query);

        //No hace falta porque lo voy a recoger todo
        /* $prepara->setFetchMode(PDO::FETCH_CLASS, "Cuadros"); */
        //No hace falta porque no hemos metido variables
        $prepara->execute(/* array[]":pintor"=>$pintor, ":pass"=>$pass) */);
        $cuadro = $prepara->fetchAll();

        //Obj coleccion vacio
        $cuadros = new Collection();
        foreach ($cuadro as $c) {
            //Ira metiendo a la coleccion $cuadros cada fila de la tabla cuadros
            $cuadros->add($c);
        }
        return $cuadros;
    }

    public function getCuadroAleatorio() {
        $conexion = BD::getConexion();
        $query = "SELECT imagen from cuadros where pintor_fk = :pintorId";
        $prepara = $conexion->prepare($query);

        //No hace falta porque lo voy a recoger todo
        /* $prepara->setFetchMode(PDO::FETCH_ASSOC); */
        //No hace falta porque no hemos metido variables
        $prepara->execute(array(":pintorId" => $this->getId()));
        $cuadro = $prepara->fetchAll();
        return $cuadro[rand(0, count($cuadro) - 1)]['imagen'];
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->pintor;
    }

    public function setNombre($pintor) {
        $this->pintor = $pintor;
    }

    function getColection() {
        return $this->colection;
    }

    function setColection($colection) {
        $this->colection = $colection;
    }

}
/*
<?php
    require_once 'BD.php';
    require_once 'Cuadros.php';
    require_once 'Collection.php';

    class Pintor {
        private $id;
        private $nombre;
        private $colection;
        
        public function __construct($nombre = null, $id = null) {
            $this->id = $id;
            $this->nombre = $nombre;
        }

        public static function creaPintor($idPintor) {
            $conexion = BD::getConexion();
            $query = "SELECT * from pintores where id=:user_fk_pintor";
            $prepara = $conexion->prepare($query);
            $prepara->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Pintor");
            $prepara->execute(array(":user_fk_pintor"=>$idPintor));
            $pintor = $prepara->fetch();
            $pintor->setColection(Cuadros::creaCuadros($pintor->getId()));
            return $pintor;
        }
        
        public static function getPintores() {
            $conexion = BD::getConexion();
            $query = "SELECT * from pintores";
            $prepara = $conexion->prepare($query);
            
            //No hace falta porque lo voy a recoger todo
            $prepara->setFetchMode(PDO::FETCH_ASSOC | PDO::FETCH_PROPS_LATE, "Pintor");
                                //No hace falta porque no hemos metido variables
            $prepara->execute(array(":pintor"=>$pintor, ":pass"=>$pass));
            $pintor = $prepara->fetchAll();
            return $pintor;
        }
        
        public static function getCuadros() {
            $conexion = BD::getConexion();
            $query = "SELECT * from cuadros where pintor_fk = $this->getId()";
            $prepara = $conexion->prepare($query);
            
            //No hace falta porque lo voy a recoger todo
            /*$prepara->setFetchMode(PDO::FETCH_CLASS, "Cuadros");*/
                                //No hace falta porque no hemos metido variables
           // $prepara->execute(/*array[]":pintor"=>$pintor, ":pass"=>$pass)*/);
            /*$cuadro = $prepara->fetchAll();
            
            //Obj coleccion vacio
            $cuadros = new Collection();
            foreach ($cuadro as $c) {
                //Ira metiendo a la coleccion $cuadros cada fila de la tabla cuadros
                $cuadros->add($c);
            }
            return $cuadros;
        }
        
        public function getCuadroAleatorio() {
            $conexion = BD::getConexion();
            $query = "SELECT imagen from cuadros where pintor_fk = :pintorId";
            $prepara = $conexion->prepare($query);
            
            //No hace falta porque lo voy a recoger todo
            /*$prepara->setFetchMode(PDO::FETCH_ASSOC);*/
                                //No hace falta porque no hemos metido variables
            /*$prepara->execute(array(":pintorId"=>$this->getId()));
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
        function getColection() {
            return $this->colection;
        }
        function setColection($colection) {
            $this->colection = $colection;
        }
    }*/        
?>
