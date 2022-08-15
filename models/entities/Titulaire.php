<?php

class Titulaire {
    private $pk;
    private $nom;
    private $prenom;
    private $ecole_id;



    public function __construct ($pk, $nom, $prenom, $ecole_id) {
        $this->pk = $pk;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->ecole_id = $ecole_id;
    }

    public function __get ($prop) {
        if (property_exists($this, $prop)) {
            return $this->$prop;
        }
    }

    public function __set ($prop, $value) {
        if(property_exists($this, $prop)) {
            $this->$prop = $value;
        }
    }
}