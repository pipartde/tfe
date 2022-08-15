<?php

class EnfantController extends AbstractController {
    public function __construct () {
        $this->dao = new EnfantDAO();
    }

    // GET
    public function index (){
        $aidepeda = $this->isLogged();

        $ecoleDAO = new EcoleDAO();
        $ecoles = $ecoleDAO->fetchAllSortedBy('nom');

        $titulaireDAO = new TitulaireDAO();
        $titulaires = $titulaireDAO->fetchAllSortedBy('nom');

        $enfants = $this->dao->fetchAllSortedBy('nom');
        include ('../views/include/header.php');
        include ('../views/enfant/list.php');

    }

    public function show ($id){
        $enfant = $this->dao->fetch($id);


        $lundi = explode(',',$enfant->planning_id->lundi);
        $mardi = explode(',',$enfant->planning_id->mardi);
        $mercredi = explode(',',$enfant->planning_id->mercredi);
        $jeudi = explode(',',$enfant->planning_id->jeudi);
        $vendredi = explode(',',$enfant->planning_id->vendredi);


        include ('../views/include/header.php');
        include ('../views/enfant/show.php');
    }


    public function create (){

        $ecoleDAO = new EcoleDAO();
        $ecoles = $ecoleDAO->fetchAllSortedBy('nom');
        $titulaireDAO = new TitulaireDAO();
        $titulaires = $titulaireDAO->fetchAllSortedBy('nom');


        include ('../views/include/header.php');
        include ('../views/enfant/create.php');
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
        $enfant = $this->dao->fetch($id);

        $ecoleDAO = new EcoleDAO();
        $ecoles = $ecoleDAO->fetchAllSortedBy('nom');
        $titulaireDAO = new TitulaireDAO();
        $titulaires = $titulaireDAO->fetchAllSortedBy('nom');



        include('../views/include/header.php');
        include('../views/enfant/edit.php');

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
        $enfants = $this->dao->fetchAllSortedBy('nom');
        $ecoleDAO = new EcoleDAO();
        $ecoles = $ecoleDAO->fetchAllSortedBy('nom');

        $titulaireDAO = new TitulaireDAO();
        $titulaires = $titulaireDAO->fetchAllSortedBy('nom');

        include ('../views/include/header.php');
        include ('../views/enfant/list.php');

    }
}