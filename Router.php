<?php

class Router {

    private $get;
    private $post;
    private $controllers;
    private $data;
    private $request;
    private $actions;

    public function __construct() {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->actions = [
            'index', 'show', 'create', 'edit', 'store', 'update', 'delete',
            'login', 'logout', 'createPlanning', 'generateSemainier'];
        $this->controllers = [
            'index' => 'AidePedaController',
            'aidepeda' => 'AidePedaController',
            'enfant' => 'EnfantController',
            'titulaire' => 'TitulaireController',
            'ecole' => 'EcoleController',
            'planning' => 'PlanningController',
            'semainier' => 'SemainierController'];
        $this->request = array();
        $this->data = $this->parseURI($_SERVER['REQUEST_URI']);
        $this->dispatch();
        $this->run();
    }

    private function parseURI ($server_uri) {
        // si il y a un ? dans $server_uri, alors enlever tout ce qu'il y a apres
        if (strpos( $server_uri, "?")) {
            $server_uri = strstr($server_uri, '?', true);
        }

        $server_uri = explode("/", substr($server_uri, 1));
        //var_dump($server_uri);
        return $server_uri;
    }

    private function dispatch () {
        //var_dump($this->data);
        //verifier si on a 1 controller, 1 action et 1 id
        if (!array_key_exists($this->data[0], $this->controllers)) {
            $this->data[0] = 'index';
        }
        $this->request['controller'] = $this->controllers[$this->data[0]];
        //var_dump($this->request['controller']);
        //detecter l'action => voir si on en a trouvé une, ou pas, si celle qu'on a trouvé est autorisée
        if (count($this->data) >= 2 && $this->data[1]) {
            if(!in_array($this->data[1], $this->actions)) {
                echo "ERR : ACTION NON TROUVEE";
                die;
            }

            $this->request['action'] = $this->data[1];
        } else {
            $this->request['action'] = "index";
        }

        //detection de l'id
        if (count($this->data) >= 3 && $this->data[2]) {
            $this->request['id'] = $this->data[2];
        } else {
            $this->request['id'] = false;
        }

        //detection get/post
        if ($this->post && count($this->post)) {
            $this->request['method'] = 'post';
        } else {
            $this->request['method'] = 'get';
        }

    }

    private function run () {
        //instancier 1 controller
        $this->controller_instance = new $this->request['controller'];

        $data = $this->get;
        if($this->request['method'] == 'post')  {
            $data = $this->post;
        }

        //appeller la méthode du controller
        $this->controller_instance->{$this->request['action']}($this->request['id'], $data);

    }
}