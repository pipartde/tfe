<?php

class EcoleController extends AbstractController {
    public function __construct () {
        $this->dao = new EcoleDAO();
    }

    // GET
    public function index (){

        $aidepeda = $this->isLogged();

        $semainierDAO = new SemainierDAO();
        $semainier = $semainierDAO->fetchAll();

        $ecoles = $this->dao->fetchAllSortedBy('nom');

        include ('../views/include/header.php');
        include('../views/include/nav.php');
        include ('../views/ecole/list.php');
        include('../views/include/footer.php');
    }


    public function create (){

        $aidepeda = $this->isLogged();

        $semainierDAO = new SemainierDAO();
        $semainier = $semainierDAO->fetchAll();

        include ('../views/include/header.php');
        include('../views/include/nav.php');
        include ('../views/ecole/create.php');
        include('../views/include/footer.php');
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

        $semainierDAO = new SemainierDAO();
        $semainier = $semainierDAO->fetchAll();

        $ecole = $this->dao->fetch($id);

        include('../views/include/header.php');
        include('../views/include/nav.php');
        include('../views/ecole/edit.php');
        include('../views/include/footer.php');

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

        $semainierDAO = new SemainierDAO();
        $semainier = $semainierDAO->fetchAll();

        $ecole = $this->dao->fetchAllSortedBy('nom');

        include ('../views/include/header.php');
        include('../views/include/nav.php');
        include ('../views/ecole/list.php');
        include('../views/include/footer.php');

    }
}