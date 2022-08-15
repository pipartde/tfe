<?php

class PlanningController extends AbstractController {
    public function __construct () {
        $this->dao = new PlanningDAO();
    }

    // GET
    public function index (){
        var_dump("index...");
        //
        //$aidepeda = $this->isLogged();
        //
        //$planning = $this->dao->fetchAll();
        //include ('../views/include/header.php');
        //include ('../views/planning/list.php');
    }

    public function show ($id){
        $aidepeda = $this->isLogged();
        $enfantDAO = new EnfantDAO();
        $enfant = $enfantDAO->fetch($id);

        $lundi = explode(',',$enfant->planning_id->lundi);
        $mardi = explode(',',$enfant->planning_id->mardi);
        $mercredi = explode(',',$enfant->planning_id->mercredi);
        $jeudi = explode(',',$enfant->planning_id->jeudi);
        $vendredi = explode(',',$enfant->planning_id->vendredi);


        include ('../views/include/header.php');
        include ('../views/planning/show.php');

    }


    public function createPlanning ($enfant_id){
        $aidepeda = $this->isLogged();
        $enfantDAO = new EnfantDAO();
        $enfant = $enfantDAO->fetch($enfant_id, false);

        include ('../views/include/header.php');
        include ('../views/planning/create.php');
    }



    public function store($id, $data)
    {
        //var_dump($data)."/n";
        $lundi = "".$data["l1"].",".$data["l2"].",".$data["l3"].",".$data["l4"].",".$data["l5"].",".$data["l6"];
        $mardi = "".$data["ma1"].",".$data["ma2"].",".$data["ma3"].",".$data["ma4"].",".$data["ma5"].",".$data["ma6"];
        $mercredi = "".$data["me1"].",".$data["me2"].",".$data["me3"].",".$data["me4"];
        $jeudi = "".$data["j1"].",".$data["j2"].",".$data["j3"].",".$data["j4"].",".$data["j5"].",".$data["j6"];
        $vendredi = "".$data["v1"].",".$data["v2"].",".$data["v3"].",".$data["v4"].",".$data["v5"].",".$data["v6"];

        $planning = ['lundi' => $lundi, 'mardi' => $mardi, 'mercredi' => $mercredi, 'jeudi' => $jeudi, 'vendredi' => $vendredi];


        $planning_id = $this->dao->store($planning);
        if($planning_id){
            $enfantDAO = new EnfantDAO();
            $enfant = $enfantDAO->fetch($data["enfant_id"], false);
            $is_updated = $enfantDAO->updatePlanning($enfant->pk,$planning_id);
            if($is_updated){
                $this->show($enfant->pk);
            }
        }
    }


    public function edit($id)
    {
        $aidepeda = $this->isLogged();
        $enfantDAO = new EnfantDAO();
        $enfant = $enfantDAO->fetchWhereOne('planning_id', $id);
        $lundi = explode(',',$enfant->planning_id->lundi);
        $mardi = explode(',',$enfant->planning_id->mardi);
        $mercredi = explode(',',$enfant->planning_id->mercredi);
        $jeudi = explode(',',$enfant->planning_id->jeudi);
        $vendredi = explode(',',$enfant->planning_id->vendredi);
        include('../views/include/header.php');
        include('../views/planning/edit.php');

    }

    public function update ($id, $data)
    {
        $aidepeda = $this->isLogged();

        $semainierDAO = new SemainierDAO();
        $semainier = $semainierDAO->fetchAll();

        $lundi = "".$data["l1"].",".$data["l2"].",".$data["l3"].",".$data["l4"].",".$data["l5"].",".$data["l6"];
        $mardi = "".$data["ma1"].",".$data["ma2"].",".$data["ma3"].",".$data["ma4"].",".$data["ma5"].",".$data["ma6"];
        $mercredi = "".$data["me1"].",".$data["me2"].",".$data["me3"].",".$data["me4"];
        $jeudi = "".$data["j1"].",".$data["j2"].",".$data["j3"].",".$data["j4"].",".$data["j5"].",".$data["j6"];
        $vendredi = "".$data["v1"].",".$data["v2"].",".$data["v3"].",".$data["v4"].",".$data["v5"].",".$data["v6"];

        $planning = ['lundi' => $lundi, 'mardi' => $mardi, 'mercredi' => $mercredi, 'jeudi' => $jeudi, 'vendredi' => $vendredi];


        $is_updated_in_db = $this->dao->update($id, $planning);
        if ($is_updated_in_db) {
            if($semainier[0]){
                if(!$semainierDAO->updateForFlag($semainier[0]->pk)){
                    echo "Erreur";
                    return http_response_code(401);
                }
            }
            $enfantDAO = new EnfantDAO();
            $enfant = $enfantDAO->fetch($data["enfant_id"], false);
            $this->show($enfant->pk);
        } else {
            echo "Erreur";
            return http_response_code(401);
        }
    }


    public function delete($id, $data) {
        $aidepeda = $this->isLogged();


        $enfantDAO = new EnfantDAO();
        $enfant = $enfantDAO->fetchWhereOne('planning_id', $data['pk']);

        $this->dao->delete($data);

        $enfant = $enfantDAO->fetch($enfant->pk);


        include ('../views/include/header.php');
        include ('../views/enfant/show.php');

    }
}