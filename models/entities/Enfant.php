<?php

class Enfant {
    private $pk;
    private $nom;
    private $prenom;
    private $ecole_id;
    private $titulaire_id;
    private $planning_id;



    public function __construct ($pk, $nom, $prenom, $ecole_id, $titulaire_id, $planning_id) {
        $this->pk = $pk;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->ecole_id = $ecole_id;
        $this->titulaire_id = $titulaire_id;
        $this->planning_id = $planning_id;
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