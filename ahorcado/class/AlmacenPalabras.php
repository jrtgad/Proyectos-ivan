<?php

    class AlmacenPalabras {

        static private $instance = null;

        public static function getInstance() {
            if (self::$instance == null) {
                self::$instance = new AlmacenPalabras("palabras.txt");
            }
            return self::$instance;
        }

        protected $nombreFichero = "palabras.txt";
        protected $listaPalabras = [];

        private function __construct($nombreFichero) {

            $this->nombreFichero = $nombreFichero;

            $palabraFichero = ''; //Almacena cada palabra leida del fichero
            // Proceso para leer las palabras del fichero de texto

            $fichero = fopen($this->nombreFichero, 'r');
            // recorre todas las palabras y las guarda en el array $palabras
            // de forma separada
            while ($palabraFichero = fgets($fichero)) {
                $this->listaPalabras[] = trim($palabraFichero);
            }
        }

        public function getPalabraAleatoria() {
            //Genero un número alatorio para acceder al array de palabras
            $numeroAleatorio = mt_rand(0, count($this->listaPalabras) - 1);
            // almaceno la palabra que se usara en la partida
            $palabraAhorcado = $this->listaPalabras[$numeroAleatorio];
            return ($palabraAhorcado);
        }

    }

?>
