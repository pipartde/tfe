<?php

date_default_timezone_set('Europe/Brussels');

abstract class AbstractController {

    public function getUser() {
        if (!isset($_COOKIE['session_token'])) {
            return false;
        }

        $AidePedaDAO = new AidePedaDAO();
        return $AidePedaDAO->fetchBySession($_COOKIE['session_token']);
    }

    public function isLogged() {
        $aidePeda = $this->getUser();
        if(!$aidePeda) {
            include('../views/auth/login.php');
            //header("Location: ../planning.tfe/login");
            die;
        }
        return $aidePeda;
    }

    // GET
    public function index () {
        var_dump('no index');
    }

    // GET
    public function show ($id) {
        var_dump('no show');
    }

    // GET
    public function create () {
        var_dump('no create');
    }

    // GET
    public function edit ($id) {
        var_dump('no edit');
    }

    // POST
    public function store ($id, $data) {
        var_dump('no store');
    }

    // POST
    public function update ($id, $data) {
        var_dump('no update');
    }

    // POST
    public function delete ($id, $data) {
        var_dump('no delete');
    }
}