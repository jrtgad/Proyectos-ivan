<?php

require_once 'Jugada.php';

class Partida {

    private $id;
    private $palabrasecreta;
    private $letrasusadas;
    private $palabradescubierta;
    private $intentos;
    private $fallos;
    private $finalizada;
    private $id_user_fk;

    public static function getPartida($user) {
        $conexion = BD::getConexion();
        $query = "SELECT * from partidas where user_id_fk=:user_id_fk AND id=:id";
        $prepara = $conexion->prepare($query);
        $prepara->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Usuario");
        $prepara->execute(array(":user_id_fk" => $this->getId_user_fk(), ":id" => $this->getId()));
        $usuario = $prepara->fetch();
        return $usuario;
    }

    public function persist() {
        if ($this->id !== null) {
            $conexion = BD::getConexion();
            $query = "UPDATE partidas SET palabrasecreta=:palabrasecreta,"
                    . " letrasusadas=:letrasusadas,"
                    . " palabradescubierta=:palabradescubierta,"
                    . " intentos=:intentos, "
                    . " fallos=:fallos, "
                    . " finalizada=:finalizada, "
                    . " WHERE id = :partidas_id";
            $update = $conexion->prepare($query);

            //ASSOC trae array asociativo,
            //(por defecto numérico y asociativo)
            $update->setFetchMode(PDO::FETCH_ASSOC);

            //Devuelve las líneas afectadas(0 no ha agregado, 1 si)
            $check = $update->execute(array(":palabrasecreta" => $this->getPalabrasecreta(),
                ":letrasusadas" => $this->getLetrasusadas(),
                ":palabradescubierta" => $this->getPalabradescubierta(),
                ":intentos" => $this->getIntentos(),
                ":fallos" => $this->getFallos(),
                ":finalizada" => $this->getFinalizada(),
                ":partidas_id" => $this->getId_user_fk()));
            return $check;
        } else {
            $conexion = BD::getConexion();
            $query = "UPDATE partidas SET palabrasecreta=:palabrasecreta,"
                    . " letrasusadas=:letrasusadas,"
                    . " palabradescubierta=:palabradescubierta,"
                    . " intentos=:intentos, "
                    . " fallos=:fallos, "
                    . " finalizada=:finalizada, "
                    . " WHERE id = :partidas_id";
            $inserta = $conexion->prepare($query);

            //ASSOC trae array asociativo,
            //(por defecto numérico y asociativo)
            $inserta->setFetchMode(PDO::FETCH_ASSOC);

            //Devuelve las líneas afectadas(0 no ha agregado, 1 si)
            return $inserta->execute(array(":palabrasecreta" => $this->getPalabrasecreta(),
                        ":letrasusadas" => $this->getLetrasusadas(),
                        ":palabradescubierta" => $this->getPalabradescubierta(),
                        ":intentos" => $this->getIntentos(),
                        ":fallos" => $this->getFallos(),
                        ":finalizada" => $this->getFinalizada(),
                        ":partidas_id" => $this->getId_user_fk()));
            $this->id = (int) $conexion->lastInsertId();
        }
    }

    function getId() {
        return $this->id;
    }

    function getPalabrasecreta() {
        return $this->palabrasecreta;
    }

    function getLetrasusadas() {
        return $this->letrasusadas;
    }

    function getPalabradescubierta() {
        return $this->palabradescubierta;
    }

    function getIntentos() {
        return $this->intentos;
    }

    function getFallos() {
        return $this->fallos;
    }

    function getFinalizada() {
        return $this->finalizada;
    }

    function getId_user_fk() {
        return $this->id_user_fk;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPalabrasecreta($palabrasecreta) {
        $this->palabrasecreta = $palabrasecreta;
    }

    function setLetrasusadas($letrasusadas) {
        $this->letrasusadas = $letrasusadas;
    }

    function setPalabradescubierta($palabradescubierta) {
        $this->palabradescubierta = $palabradescubierta;
    }

    function setIntentos($intentos) {
        $this->intentos = $intentos;
    }

    function setFallos($fallos) {
        $this->fallos = $fallos;
    }

    function setFinalizada($finalizada) {
        $this->finalizada = $finalizada;
    }

    function setId_user_fk($id_user_fk) {
        $this->id_user_fk = $id_user_fk;
    }

}
