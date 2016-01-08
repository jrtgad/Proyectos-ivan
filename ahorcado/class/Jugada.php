<?php

    class Jugada {

<<<<<<< HEAD
        private $id;
        private $id_partida_fk;

        function getId() {
            return $this->id;
        }
=======
    private $id_jugada;
    private $letra;
    private $id_partida_fk;

    function __construct($id_partida_fk = null, $letra = null, $id = null) {
        $this->id_jugada = $id;
        $this->letra = $letra;
        $this->id_partida_fk = $id_partida_fk;
    }

    public static function getJugadas($partida) {
        $conexion = BD::getConexion();
        $query = "SELECT * from jugada where id_partida=:id_partida";
        $prepara = $conexion->prepare($query);
        $prepara->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Jugada");
        $prepara->execute(array(":id_partida" => $partida));
        $jugada = $prepara->fetchAll();
        $jugadas = new Collection();
        if ($jugada) {
            foreach ($jugada as $valor) {
                $jugadas->add($valor);
            }
        }
        return $jugadas;
    }

    public function persist() {
        $conexion = BD::getConexion();
        $query = "INSERT INTO jugada (id_partida,letra) "
                . "VALUES(:id_partida, :letra)";
        $inserta = $conexion->prepare($query);

//Devuelve las líneas afectadas(0 no ha agregado, 1 si)
        $inserta->execute(array(":id_partida" => $this->getId_partida_fk(),
            ":letra" => $this->getLetra()));
        $this->id_jugada = (int) $conexion->lastInsertId();
    }

    function getId() {
        return $this->id_jugada;
    }
>>>>>>> 8cc4705eb682705a7796659d1ea5ea81e171d509

        function getId_partida_fk() {
            return $this->id_partida_fk;
        }

<<<<<<< HEAD
        function setId($id) {
            $this->id = $id;
        }
=======
    function getLetra() {
        return $this->letra;
    }

    function setLetra($letra) {
        $this->letra = $letra;
    }

    function setId($id) {
        $this->id_jugada = $id;
    }
>>>>>>> 8cc4705eb682705a7796659d1ea5ea81e171d509

        function setId_partida_fk($id_partida_fk) {
            $this->id_partida_fk = $id_partida_fk;
        }

<<<<<<< HEAD
        public function persist() {
            if ($this->id !== null) {
                $conexion = BD::getConexion();
                $query = "UPDATE jugada SET user=:user, pass=:pass, partidas=:partidas, rol=:rol WHERE id = :id_user";
                $update = $conexion->prepare($query);

                //ASSOC trae array asociativo,
                //(por defecto numérico y asociativo)
                $update->setFetchMode(PDO::FETCH_ASSOC);

                //Devuelve las líneas afectadas(0 no ha agregado, 1 si)
                $check = $update->execute(array(":user" => $this->getUser(),
                    ":pass" => $this->getPass(),
                    ":partidas" => $this->getPartidas(),
                    ":rol" => $this->getRol(),
                    ":id_user" => $this->getId()));
                return $check;
            } else {
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
                            ":pintor_fk" => $this->getPintor()));
                $this->id = (int) $conexion->lastInsertId();
            }
        }

    }
=======
}
>>>>>>> 8cc4705eb682705a7796659d1ea5ea81e171d509
