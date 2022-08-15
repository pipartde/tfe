<?php

class TitulaireController extends AbstractController {
    public function __construct () {
        $this->dao = new TitulaireDAO();
    }

    // GET
    public function index (){
        $aidepeda = $this->isLogged();

        $ecoleDAO = new EcoleDAO();
        $ecoles = $ecoleDAO->fetchAllSortedBy('nom');

        $titulaires = $this->dao->fetchAllSortedBy('nom');

        $semainierDAO = new SemainierDAO();
        $semainier = $semainierDAO->fetchAll();

        include ('../views/include/header.php');
        include('../views/include/nav.php');
        include ('../views/titulaire/list.php');
        include('../views/include/footer.php');
    }


    public function create (){

        $ecoleDAO = new EcoleDAO();
        $ecoles = $ecoleDAO->fetchAllSortedBy('nom');

        $semainierDAO = new SemainierDAO();
        $semainier = $semainierDAO->fetchAll();

        include ('../views/include/header.php');
        include('../views/include/nav.php');
        include ('../views/titulaire/create.php');
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

        $titulaire = $this->dao->fetch($id);

        $semainierDAO = new SemainierDAO();
        $semainier = $semainierDAO->fetchAll();

        $ecoleDAO = new EcoleDAO();
        $ecoles = $ecoleDAO->fetchAllSortedBy('nom');

        include('../views/include/header.php');
        include('../views/include/nav.php');
        include('../views/titulaire/edit.php');
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
        $titulaires = $this->dao->fetchAllSortedBy('nom');

        $ecoleDAO = new EcoleDAO();
        $ecoles = $ecoleDAO->fetchAllSortedBy('nom');

        $semainierDAO = new SemainierDAO();
        $semainier = $semainierDAO->fetchAll();

        include ('../views/include/header.php');
        include('../views/include/nav.php');
        include ('../views/titulaire/list.php');
        include('../views/include/footer.php');
    }
}