<?php

class Liga {

    private $id;
    private $jornadas;

    public function getLiga() {
        return Jornada::getJornadas();        
    }
    
    function __construct($id, $jornadas) {
        $this->id = $id;
        $this->jornadas = new Collection();
    }

    function getId() {
        return $this->id;
    }

    function getJornadas() {
        return $this->jornadas;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setJornadas($jornadas) {
        $this->jornadas = $jornadas;
    }

}
