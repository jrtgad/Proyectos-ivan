<?php

require_once 'Jugada.php';
require_once 'Collection.php';
require_once 'AlmacenPalabras.php';

class Partida {

    private $id_partida;
    private $palabrasecreta;
    private $letrasusadas;
    private $palabradescubierta;
    private $intentos;
    private $fallos;
    private $finalizada;
    private $id_user_fk;

    public static function getPartida($user) {
        $conexion = BD::getConexion();
        $query = "SELECT * from partidas where id_user_fk=:id_user_fk";
        $prepara = $conexion->prepare($query);
        $prepara->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Partida");
        $prepara->execute(array(":id_user_fk" => $this->getId_user_fk(), ":id" => $this->getId()));
        $partida = $prepara->fetchAll();
        $partidas = new Collection();
        if ($partida) {
            foreach ($partida as $game) {
                $partidas->add($game);
            }
        }
        return $partidas;
    }

    function __construct($letrasusadas = null, $palabradescubierta = null, $intentos = null, $fallos = null, $finalizada = null, $id_user_fk = null, $palabrasecreta = null, $id_partida = null) {


        $this->letrasusadas = "";
        $this->palabradescubierta = "";
        $this->intentos = 0;
        $this->fallos = 0;
        $this->finalizada = false;
        $this->id_user_fk = $id_user_fk;
        $this->palabrasecreta = AlmacenPalabras::getInstance()->getPalabraAleatoria();
        $this->id_partida = $id_partida;
    }

    public function persist() {
        if ($this->id_partida !== null) {
            $conexion = BD::getConexion();
            $query = "UPDATE partidas SET palabrasecreta=:palabrasecreta,"
                    . " letrasusadas=:letrasusadas,"
                    . " palabradescubierta=:palabradescubierta,"
                    . " intentos=:intentos, "
                    . " fallos=:fallos, "
                    . " finalizada=:finalizada, "
                    . " WHERE id = :id_partida";
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
                ":id_user_fk" => $this->getId_user_fk(),
                ":id_partida" => $this->getId_Partida()));
            return $check;
        } else {
            $conexion = BD::getConexion();
            $query = "UPDATE partidas SET palabrasecreta=:palabrasecreta,"
                    . " letrasusadas=:letrasusadas,"
                    . " palabradescubierta=:palabradescubierta,"
                    . " intentos=:intentos, "
                    . " fallos=:fallos, "
                    . " finalizada=:finalizada, "
                    . " WHERE id = :id_partida";
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
                        ":id_partida" => $this->getId_user_fk()));
            $this->id_partida = (int) $conexion->lastInsertId();
        }
    }

    function compruebaJugada($letra) {

        $copiaSecreta = $this->getPalabrasecreta();

        $posicion = strpos($copiaSecreta, $letra);

        if ($posicion === false) {
            $this->setFallos($this->getFallos() + 1);
        }
        while ($posicion !== false) {
            $copiaSecreta[$posicion] = "_";
            $this->palabradescubierta[$posicion] = $letra;
            $posicion = strpos($copiaSecreta, $letra);
        }
        $this->setIntentos($this->getIntentos() + 1);
        $this->setLetrasusadas($this->getLetrasusadas() . " " . $letra);
    }

    function get_IdPartida() {
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

    function getJugadas() {
        return $this->jugadas;
    }

    function setId_Partida($id) {
        $this->id = $id;
    }

    function setJugadas($jugadas) {
        $this->jugadas = $jugadas;
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
