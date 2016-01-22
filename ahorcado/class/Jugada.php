<?php

class Jugada {

    private $id;
    private $letrausada;
    private $id_partida_fk;

    function __construct($id_partida_fk = null, $letrausada = null, $id = null) {
        $this->id = $id;
        $this->letrausada = $letrausada;
        $this->id_partida_fk = $id_partida_fk;
    }

    public static function getJugadas($partida) {
        $conexion = BD::getConexion();
        $query = "SELECT * from jugada where id_partida_fk=:id_partida_fk";
        $prepara = $conexion->prepare($query);
        $prepara->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Jugada");
        $prepara->execute(array(":id_partida_fk" => $partida));
        $jugada = $prepara->fetchAll();
        $jugadas = new Collection();
        if ($jugada) {
            foreach ($jugada as $valor) {
                $jugadas->add($valor);
            }
        }
        return $jugadas;
    }

    function getId() {
        return $this->id;
    }

    function getId_partida_fk() {
        return $this->id_partida_fk;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getLetra() {
        return $this->letrausada;
    }

    function setLetra($letrausada) {
        $this->letrausada = $letrausada;
    }

    function setId_partida_fk($id_partida_fk) {
        $this->id_partida_fk = $id_partida_fk;
    }

    public function persist() {
        if ($this->id !== null) {
            $conexion = BD::getConexion();
            $query = "UPDATE jugada SET letrausada=:letrausada, id_partida_fk=:id_partida_fk";
            $update = $conexion->prepare($query);

            //ASSOC trae array asociativo,
            //(por defecto numérico y asociativo)
            $update->setFetchMode(PDO::FETCH_ASSOC);

            //Devuelve las líneas afectadas(0 no ha agregado, 1 si)
            $check = $update->execute(array(":letrausada" => $this->getLetra(),
                ":id_partida_fk" => $this->getId_partida_fk()));
            return $check;
        } else {
            $conexion = BD::getConexion();
            $query = "INSERT INTO jugada (letrausada,id_partida_fk) "
                    . "VALUES(:letrausada, :id_partida_fk)";
            $inserta = $conexion->prepare($query);

            //ASSOC trae array asociativo,
            //(por defecto numérico y asociativo)
            $inserta->setFetchMode(PDO::FETCH_ASSOC);

            //Devuelve las líneas afectadas(0 no ha agregado, 1 si)
            return $inserta->execute(array(":letrausada" => $this->getLetra(),
                        ":id_partida_fk" => $this->getId_partida_fk()));
            $this->id = (int) $conexion->lastInsertId();
        }
    }

}
