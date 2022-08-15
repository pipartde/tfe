<?php

class Ecole {
    private $pk;
    private $nom;
    private $adresse;



    public function __construct ($pk, $nom, $adresse) {
        $this->pk = $pk;
        $this->nom = $nom;
        $this->adresse = $adresse;
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