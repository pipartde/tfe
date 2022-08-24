<?php

class Semainier {
    private $pk;
    private $lundi;
    private $mardi;
    private $mercredi;
    private $jeudi;
    private $vendredi;
    private $planningupdated;



    public function __construct ($pk, $lundi, $mardi, $mercredi, $jeudi, $vendredi, $planningupdated) {
        $this->pk = $pk;
        $this->lundi = $lundi;
        $this->mardi = $mardi;
        $this->mercredi = $mercredi;
        $this->jeudi = $jeudi;
        $this->vendredi = $vendredi;
        $this->planningupdated = $planningupdated;
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