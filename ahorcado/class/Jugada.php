<?php

class Jugada {

    private $id;
    private $letra;
    private $id_partida_fk;

    function __construct($id_partida_fk = null, $letra = null, $id = null) {
        $this -> id = $id;
        $this -> letra = $letra;
        $this -> id_partida_fk = $id_partida_fk;
    }

    public static function getJugadas($partida) {
        $conexion = BD::getConexion();
        $query = "SELECT * from jugadas where id_partida=:id_partida";
        $prepara = $conexion -> prepare($query);
        $prepara -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Jugada");
        $prepara -> execute(array(":id_partida" => $partida));
        $jugada = $prepara -> fetchAll();
        $jugadas = new Collection();
        if ($jugada) {
            foreach ($jugada as $valor) {
                $jugadas -> add($valor);        
            }
        }
        return $jugadas;
    }
    
    public function persist() {
        $conexion = BD::getConexion();
        $query = "INSERT INTO jugadas (id_partida,letra) "
                . "VALUES(:id_partida, :letra)";
        $inserta = $conexion -> prepare($query);

//Devuelve las líneas afectadas(0 no ha agregado, 1 si)
        $inserta -> execute(array(":id_partida" => $this -> getId_partida_fk(),
            ":letra" => $this -> getLetra()));
        $this -> id = (int) $conexion -> lastInsertId();
    }

    function getId() {
        return $this -> id;
    }

    function getId_partida_fk() {
        return $this -> id_partida_fk;
    }

    function setId($id) {
        $this -> id = $id;
    }

    function setId_partida_fk($id_partida_fk) {
        $this -> id_partida_fk = $id_partida_fk;
    }

}
