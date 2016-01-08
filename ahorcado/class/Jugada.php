<?php

    class Jugada {

        private $id;
        private $id_partida_fk;

        function getId() {
            return $this->id;
        }

        function getId_partida_fk() {
            return $this->id_partida_fk;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setId_partida_fk($id_partida_fk) {
            $this->id_partida_fk = $id_partida_fk;
        }

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
