<?php

class AidePeda {
    private $pk;
    private $username;
    private $email;
    private $password;
    private $nom;
    private $prenom;
    private $session_token;
    private $lastLog;
    private $semainier_id;

    public function __construct ($pk, $username, $email, $password, $nom, $prenom, $session_token, $lastLog, $semainier_id) {
        $this->pk = $pk;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->session_token = $session_token;
        $this->lastLog = $lastLog;
        $this->semainier_id = $semainier_id;
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