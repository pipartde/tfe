<?php

class EcoleController extends AbstractController {
    public function __construct () {
        $this->dao = new EcoleDAO();
    }

    // GET
    public function index (){
        $aidepeda = $this->isLogged();

        $ecoles = $this->dao->fetchAllSortedBy('nom');
        include ('../views/include/header.php');
        include ('../views/ecole/list.php');

    }


    public function create (){
        include ('../views/include/header.php');
        include ('../views/ecole/create.php');
    }



    public function store($id, $data)
    {

        $is_stored_in_db = $this->dao->store($data);
        if($is_stored_in_db){
            $this->index();
        }


    }


    public function edit($id)
    {
        $aidepeda = $this->isLogged();

        $ecole = $this->dao->fetch($id);


        include('../views/include/header.php');
        include('../views/ecole/edit.php');

    }

    public function update ($id, $data)
    {
        $aidepeda = $this->isLogged();
        $is_stored_in_db = $this->dao->update($id, $data);
        if ($is_stored_in_db) {
            $this->index();
        } else {
            echo "Erreur";
            return http_response_code(401);
        }
    }


    public function delete($id, $data) {
        $aidepeda = $this->isLogged();
        $this->dao->delete($data);
        $ecole = $this->dao->fetchAllSortedBy('nom');
        include ('../views/include/header.php');
        include ('../views/ecole/list.php');

    }
}