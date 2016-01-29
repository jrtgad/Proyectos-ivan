<?php

    require_once 'Jugada.php';
    require_once 'Collection.php';
    require_once 'AlmacenPalabras.php';

    class Partida {

        private $id;
        private $palabrasecreta;
        private $letrasusadas;
        private $palabradescubierta;
        private $intentos;
        private $fallos;
        private $finalizada;
        private $id_user_fk;
        private $jugadas;

        public static function getPartida($user) {
            $conexion = BD::getConexion();
            $query = "SELECT * from partidas where id_user_fk = :id_user_fk";
            $prepara = $conexion->prepare($query);
            $prepara->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Partida");
            $prepara->execute(array(":id_user_fk" => $user));
            $partida = $prepara->fetchAll();
            $partidas = new Collection();
            if ($partida) {
                foreach ($partida as $game) {
                    $partidas->add($game);
                }
            }
            return $partidas;
        }

        function __construct($id_user_fk = null, $letrasusadas = null, $intentos = null, $fallos = null, $finalizada = null, $palabrasecreta = null, $jugadas = null, $id = null, $palabradescubierta = null) {
            $this->letrasusadas = "";
            $this->intentos = 0;
            $this->fallos = 0;
            $this->finalizada = 0;
            $this->id_user_fk = $id_user_fk;
            $this->palabrasecreta = AlmacenPalabras::getInstance()->getPalabraAleatoria();
            $this->jugadas = new Collection();
            $this->id = $id;
            //Reemplaza cada letra por un guion (/\w{1}/)
            $this->palabradescubierta = preg_replace("/\w{1}/", "_", $this->palabrasecreta);
        }

        public function persist() {
            if ($this->id !== null) {
                $conexion = BD::getConexion();
                $query = "UPDATE partidas SET palabrasecreta=:palabrasecreta,"
                        . "letrasusadas=:letrasusadas,"
                        . "palabradescubierta=:palabradescubierta,"
                        . "intentos=:intentos,"
                        . "fallos=:fallos,"
                        . "finalizada=:finalizada,"
                        . "WHERE id=:id";
                $update = $conexion->prepare($query);
                $update->execute(array(":palabrasecreta" => $this->getPalabrasecreta(),
                    ":letrasusadas" => $this->getLetrasusadas(),
                    ":palabradescubierta" => $this->getPalabradescubierta(),
                    ":intentos" => $this->getIntentos(),
                    ":fallos" => $this->getFallos(),
                    ":finalizada" => $this->getFinalizada(),
                    ":id" => $this->get_IdPartida()));
                $update;
            } else {
                $conexion = BD::getConexion();
                $query = "INSERT INTO partidas SET palabrasecreta=:palabrasecreta,"
                        . "letrasusadas=:letrasusadas,"
                        . "palabradescubierta=:palabradescubierta,"
                        . "intentos=:intentos,"
                        . "fallos=:fallos,"
                        . "finalizada=:finalizada,"
                        . "id_user_fk=:id_user_fk";
                $inserta = $conexion->prepare($query);

                //Devuelve las líneas afectadas(0 no ha agregado, 1 si)
                $inserta->execute(array(":palabrasecreta" => $this->getPalabrasecreta(),
                    ":letrasusadas" => $this->getLetrasusadas(),
                    ":palabradescubierta" => $this->getPalabradescubierta(),
                    ":intentos" => $this->getIntentos(),
                    ":fallos" => $this->getFallos(),
                    ":finalizada" => $this->getFinalizada(),
                    ":id_user_fk" => $this->getId_user_fk()));
                $this->id = $conexion->lastInsertId();
            }
        }

        function compruebaJugada($letra) {
            $jugada = new Jugada($this->get_IdPartida(), $_POST["letra"]);
            $jugada->persist();
            $this->getJugadas()->add($jugada);
            $copiaSecreta = $this->getPalabrasecreta();
            $posicion = strpos($copiaSecreta, $letra);
            if ($posicion === false) {
                $this->setFallos($this->getFallos() + 1);
            } else {
                while ($posicion !== false) {
                    $copiaSecreta[$posicion] = "_";
                    $this->palabradescubierta[$posicion] = $letra;
                    $posicion = strpos($copiaSecreta, $letra);
                }
                $this->setIntentos($this->getIntentos() + 1);
                $this->setLetrasusadas($this->getLetrasusadas() . " " . $letra);
                $this->persist();
            }
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
