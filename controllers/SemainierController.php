<?php

class SemainierController extends AbstractController {
    public function __construct () {
        $this->dao = new SemainierDAO();
    }

    public function index (){

        echo "page d'index";
    }

    public function show ($id){
        $aidepeda = $this->isLogged();
        $aidepedaDAO = new AidePedaDAO();
        $aidepeda = $aidepedaDAO->fetchWhereOne('semainier_id',$id);
        $semainier = $this->dao->fetch($id);
        $enfantDAO = new EnfantDAO();
        $enfants = $enfantDAO->fetchAllSortedBy('pk');


        $lundi1 = explode(',',$semainier->lundi);
        $mardi1 = explode(',',$semainier->mardi);
        $mercredi1 = explode(',',$semainier->mercredi);
        $jeudi1 = explode(',',$semainier->jeudi);
        $vendredi1 = explode(',',$semainier->vendredi);
        $jour = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi'];
        $semaine = ['lundi' => [], 'mardi' => [], 'mercredi' => [], 'jeudi' => [], 'vendredi' => []];
        for ($i=0 ; $i<=4 ; $i++) {
            if ($i == 0) {
                foreach ($lundi1 as $perlundi) {
                    foreach ($enfants as $enfant) {
                        if ($perlundi == $enfant->pk) {
                            array_push($semaine[$jour[$i]], $enfant);
                        }
                    }
                }
            } elseif ($i === 1) {
                foreach ($mardi1 as $permardi) {
                    foreach ($enfants as $enfant) {
                        if ($permardi == $enfant->pk) {
                            array_push($semaine[$jour[$i]], $enfant);
                        }
                    }
                }
            } elseif ($i == 2) {
                foreach ($mercredi1 as $permer) {
                    foreach ($enfants as $enfant) {
                        if ($permer == $enfant->pk) {
                            array_push($semaine[$jour[$i]], $enfant);
                        }
                    }
                }
            } elseif ($i == 3) {
                foreach ($jeudi1 as $perjeudi) {
                    foreach ($enfants as $enfant) {
                        if ($perjeudi == $enfant->pk) {
                            array_push($semaine[$jour[$i]], $enfant);
                        }
                    }
                }
            } elseif ($i == 4) {
                foreach ($vendredi1 as $perven) {
                    foreach ($enfants as $enfant) {
                        if ($perven == $enfant->pk) {
                            array_push($semaine[$jour[$i]], $enfant);
                        }
                    }
                }
            }
        }

        //echo "<pre>",var_dump($semainier->lundi),"<pre>";die;

        include ('../views/include/header.php');
        include ('../views/semainier/show.php');
    }


    public function generateSemainier (){
        $aidepeda = $this->isLogged();

        $enfantDAO = new EnfantDAO();
        $enfants = $enfantDAO->fetchAllSortedBy('pk');

        $semainiertest =  ['L12','L34','L56','MA12','MA34','MA56','ME12','ME34','J12','J34','J56','V12', 'V34','V56'];
        $pkenfant = [];

        foreach ($enfants as $enfant){
            array_push($pkenfant,$enfant->pk);
        }
        function combine($tab,$longueur)
        {
            if ($longueur == 0) {
                return (array(''));
            }
            $result = array();
            for ($i = 1; $i <= $longueur; $i++) {
                foreach ($tab as $index => $valeur) {
                    $tab2 = $tab;
                    unset($tab2[$index]);
                    $tab3 = combine($tab2, $longueur - 1);

                    foreach ($tab3 as $valeur3) {
                        $result[] = $valeur.$valeur3;
                    }
                }
                return $result;
            }
        }

        $result = combine($pkenfant,count($enfants));
        $listingcombinaison = [];
        foreach ($result as $combinaison){
            array_push($listingcombinaison,str_split($combinaison));
        }
        $tablisting = [];
        $i = 0;
        foreach ($listingcombinaison as $combinaison){
            //echo "<pre>",var_dump($combinaison),"<pre>";
            $j = 0;
            foreach ($combinaison as $pk){
                foreach ($enfants as $enfant){
                    if($pk == $enfant->pk){
                        $tablisting[$i][$j] = $enfant;
                    }
                    $j +=1;
                }
            }
            $i +=1;
        }
        $listingSemainier = [];
        $k=0;
        foreach ($tablisting as $listing) {
            //echo "<pre>", var_dump($listing), "<pre>";
            $enfantRegistered = []; $enfantCompteur = [];
            $semainier = ['L12' => [], 'L34' => [], 'L56' => [], 'MA12' => [], 'MA34' => [], 'MA56' => [], 'ME12' => [], 'ME34' => [], 'J12' => [], 'J34' => [],'J56' => [],'V12' => [],'V34' => [], 'V56' => []];

            $a = 0;
            $b = 1;
            for ($index = 0; $index <= 13; $index++) {
                if ($index <= 2) {
                    foreach ($listing as $enfant) {
                        //echo "<pre>", var_dump($enfant->prenom), "<pre>";

                        if (in_array($enfant->pk, $enfantRegistered) && !in_array($enfant->pk, $enfantCompteur)) {
                            $lundi = explode(',', $enfant->planning_id->lundi);
                            if ($lundi[$a] === "true" && $lundi[$b] === "true") {
                                array_push($semainier[$semainiertest[$index]], $enfant->prenom . ' ' . $enfant->nom);
                                array_push($enfantCompteur, $enfant->pk);
                            }
                            if ($semainier[$semainiertest[$index]]) {
                                break;
                            }
                        }
                        elseif (!in_array($enfant->pk, $enfantRegistered)) {
                            $lundi = explode(',', $enfant->planning_id->lundi);
                            if ($lundi[$a] === "true" && $lundi[$b] === "true") {
                                array_push($semainier[$semainiertest[$index]], $enfant->prenom . ' ' . $enfant->nom);
                                array_push($enfantRegistered, $enfant->pk);
                            }
                            if ($semainier[$semainiertest[$index]]) {
                                break;
                            }
                        }
                    }
                    $a += 2;
                    $b += 2;
                }
                elseif ($index <= 5) {
                    if ($index === 3) {
                        $a = 0;
                        $b = 1;
                    }
                    foreach ($listing as $enfant) {
                        if (in_array($enfant->pk, $enfantRegistered) && !in_array($enfant->pk, $enfantCompteur)) {
                            $mardi = explode(',', $enfant->planning_id->mardi);
                            if ($mardi[$a] === "true" && $mardi[$b] === "true") {
                                array_push($semainier[$semainiertest[$index]], $enfant->prenom . ' ' . $enfant->nom);
                                array_push($enfantCompteur, $enfant->pk);
                            }
                            if ($semainier[$semainiertest[$index]]) {
                                break;
                            }
                        } elseif (!in_array($enfant->pk, $enfantRegistered)) {
                            $mardi = explode(',', $enfant->planning_id->mardi);
                            if ($mardi[$a] === "true" && $mardi[$b] === "true") {
                                array_push($semainier[$semainiertest[$index]], $enfant->prenom . ' ' . $enfant->nom);
                                array_push($enfantRegistered, $enfant->pk);
                            }
                            if ($semainier[$semainiertest[$index]]) {
                                break;
                            }
                        }
                    }
                    $a += 2;
                    $b += 2;
                }
                elseif ($index <= 7) {
                    if ($index == 6) {
                        $a = 0;
                        $b = 1;
                    }
                    foreach ($listing as $enfant) {
                        if (in_array($enfant->pk, $enfantRegistered) && !in_array($enfant->pk, $enfantCompteur)) {
                            $mercredi = explode(',', $enfant->planning_id->mercredi);
                            if ($mercredi[$a] === "true" && $mercredi[$b] === "true") {
                                array_push($semainier[$semainiertest[$index]], $enfant->prenom . ' ' . $enfant->nom);
                                array_push($enfantCompteur, $enfant->pk);
                            }
                            if ($semainier[$semainiertest[$index]]) {
                                break;
                            }
                        } elseif (!in_array($enfant->pk, $enfantRegistered)) {
                            $mercredi = explode(',', $enfant->planning_id->mercredi);
                            if ($mercredi[$a] === "true" && $mercredi[$b] === "true") {
                                array_push($semainier[$semainiertest[$index]], $enfant->prenom . ' ' . $enfant->nom);
                                array_push($enfantRegistered, $enfant->pk);
                            }
                            if ($semainier[$semainiertest[$index]]) {
                                break;
                            }
                        }
                    }
                    $a += 2;
                    $b += 2;
                }
                elseif ($index <= 10) {
                    if ($index == 8) {
                        $a = 0;
                        $b = 1;
                    }
                    foreach ($listing as $enfant) {
                        if (in_array($enfant->pk, $enfantRegistered) && !in_array($enfant->pk, $enfantCompteur)) {
                            $jeudi = explode(',', $enfant->planning_id->jeudi);
                            if ($jeudi[$a] === "true" && $jeudi[$b] === "true") {
                                array_push($semainier[$semainiertest[$index]], $enfant->prenom . ' ' . $enfant->nom);
                                array_push($enfantCompteur, $enfant->pk);
                            }
                            if ($semainier[$semainiertest[$index]]) {
                                break;
                            }
                        } elseif (!in_array($enfant->pk, $enfantRegistered)) {
                            $jeudi = explode(',', $enfant->planning_id->jeudi);
                            if ($jeudi[$a] === "true" && $jeudi[$b] === "true") {
                                array_push($semainier[$semainiertest[$index]], $enfant->prenom . ' ' . $enfant->nom);
                                array_push($enfantRegistered, $enfant->pk);
                            }
                            if ($semainier[$semainiertest[$index]]) {
                                break;
                            }
                        }
                    }
                    $a += 2;
                    $b += 2;
                }
                else {
                    if ($index == 11) {
                        $a = 0;
                        $b = 1;
                    }
                    foreach ($listing as $enfant) {
                        if (in_array($enfant->pk, $enfantRegistered) && !in_array($enfant->pk, $enfantCompteur)) {
                            $vendredi = explode(',', $enfant->planning_id->vendredi);
                            if ($vendredi[$a] === "true" && $vendredi[$b] === "true") {
                                array_push($semainier[$semainiertest[$index]], $enfant->prenom . ' ' . $enfant->nom);
                                array_push($enfantCompteur, $enfant->pk);
                            }
                            if ($semainier[$semainiertest[$index]]) {
                                break;
                            }
                        } elseif (!in_array($enfant->pk, $enfantRegistered)) {
                            $vendredi = explode(',', $enfant->planning_id->vendredi);
                            if ($vendredi[$a] === "true" && $vendredi[$b] === "true") {
                                array_push($semainier[$semainiertest[$index]], $enfant->prenom . ' ' . $enfant->nom);
                                array_push($enfantRegistered, $enfant->pk);
                            }
                            if ($semainier[$semainiertest[$index]]) {
                                break;
                            }
                        }
                    }
                    $a += 2;
                    $b += 2;
                }
            }
            if (!in_array($semainier,$listingSemainier)){
                if(count($enfantCompteur)==6){
                    $listingSemainier[$k]=$semainier;
                }
            }
            $k += 1;
        }

        include ('../views/include/header.php');
        include ('../views/semainier/create.php');
    }


    public function store($id, $data)
    {

        $enfantDAO = new EnfantDAO();
        $enfants = $enfantDAO->fetchAllSortedBy('pk');

        $i=0;
        $result = ['lundi' => "", 'mardi' => "", 'mercredi' => "", 'jeudi' => "", 'vendredi' => ""];

        $semainierDAO = new SemainierDAO();
        $semainier = $semainierDAO->fetchAll();
        if($semainier[0]){
            $toDelete = ['pk'=> $semainier[0]->pk];
            $this->dao->delete($toDelete);
            foreach ($data as $deuxheure) {
                $nomEnfant = explode(" ",$deuxheure);
                foreach ($enfants as $enfant){
                    if ($enfant->prenom == $nomEnfant[0] && $enfant->nom == $nomEnfant[1]){
                        if($i==0){
                            $result['lundi'] .= $enfant->pk;
                        }
                        elseif ($i<=2){
                            $result['lundi'] .= ",".$enfant->pk;
                        }
                        elseif ($i==3){
                            $result['mardi'] .= $enfant->pk;
                        }
                        elseif ($i<=5){
                            $result['mardi'] .= ",".$enfant->pk;
                        }
                        elseif ($i==6){
                            $result['mercredi'] .= $enfant->pk;
                        }
                        elseif ($i==7){
                            $result['mercredi'] .= ",".$enfant->pk;
                        }
                        elseif ($i==8){
                            $result['jeudi'] .= $enfant->pk;
                        }
                        elseif ($i<=10){
                            $result['jeudi'] .= ",".$enfant->pk;
                        }
                        elseif ($i==11){
                            $result['vendredi'] .= $enfant->pk;
                        }
                        else {
                            $result['vendredi'] .= ",".$enfant->pk;
                        }
                    }
                    elseif ($nomEnfant[0] === ""){
                        if($i==0){
                            $result['lundi'] .= " ";
                        }
                        elseif ($i<=2){
                            $result['lundi'] .= ", ";
                        }
                        elseif ($i==3){
                            $result['mardi'] .= " ";
                        }
                        elseif ($i<=5){
                            $result['mardi'] .= ", ";
                        }
                        elseif ($i==6){
                            $result['mercredi'] .= " ";
                        }
                        elseif ($i==7){
                            $result['mercredi'] .= ", ";
                        }
                        elseif ($i==8){
                            $result['jeudi'] .= " ";
                        }
                        elseif ($i<=10){
                            $result['jeudi'] .= ", ";
                        }
                        elseif ($i==11){
                            $result['vendredi'] .= " ";
                        }
                        else {
                            $result['vendredi'] .= ", ";
                        }
                        break;
                    }
                }
                $i+=1;
            }
            $semainier_id = $this->dao->store($result);
            if ($semainier_id){
                $aidepedaDAO = new AidePedaDAO();
                $aidepeda = $aidepedaDAO->fetchAll();
                $is_updated = $aidepedaDAO->updateSemainier($aidepeda[0]->pk,$semainier_id);
                if($is_updated){
                    $this->show($semainier_id);

                }
            }
        } else {
            foreach ($data as $deuxheure) {
                $nomEnfant = explode(" ",$deuxheure);
                foreach ($enfants as $enfant){
                    if ($enfant->prenom == $nomEnfant[0] && $enfant->nom == $nomEnfant[1]){
                        if($i==0){
                            $result['lundi'] .= $enfant->pk;
                        }
                        elseif ($i<=2){
                            $result['lundi'] .= ",".$enfant->pk;
                        }
                        elseif ($i==3){
                            $result['mardi'] .= $enfant->pk;
                        }
                        elseif ($i<=5){
                            $result['mardi'] .= ",".$enfant->pk;
                        }
                        elseif ($i==6){
                            $result['mercredi'] .= $enfant->pk;
                        }
                        elseif ($i==7){
                            $result['mercredi'] .= ",".$enfant->pk;
                        }
                        elseif ($i==8){
                            $result['jeudi'] .= $enfant->pk;
                        }
                        elseif ($i<=10){
                            $result['jeudi'] .= ",".$enfant->pk;
                        }
                        elseif ($i==11){
                            $result['vendredi'] .= $enfant->pk;
                        }
                        else {
                            $result['vendredi'] .= ",".$enfant->pk;
                        }
                    }
                    elseif ($nomEnfant[0] === ""){
                        if($i==0){
                            $result['lundi'] .= " ";
                        }
                        elseif ($i<=2){
                            $result['lundi'] .= ", ";
                        }
                        elseif ($i==3){
                            $result['mardi'] .= " ";
                        }
                        elseif ($i<=5){
                            $result['mardi'] .= ", ";
                        }
                        elseif ($i==6){
                            $result['mercredi'] .= " ";
                        }
                        elseif ($i==7){
                            $result['mercredi'] .= ", ";
                        }
                        elseif ($i==8){
                            $result['jeudi'] .= " ";
                        }
                        elseif ($i<=10){
                            $result['jeudi'] .= ", ";
                        }
                        elseif ($i==11){
                            $result['vendredi'] .= " ";
                        }
                        else {
                            $result['vendredi'] .= ", ";
                        }
                        break;
                    }
                }
                $i+=1;
            }
            $semainier_id = $this->dao->store($result);
            if ($semainier_id){
                $aidepedaDAO = new AidePedaDAO();
                $aidepeda = $aidepedaDAO->fetchAll();
                $is_updated = $aidepedaDAO->updateSemainier($aidepeda[0]->pk,$semainier_id);
                if($is_updated){
                    $this->show($semainier_id);

                }
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

        $lundi = "".$data["l1"].",".$data["l2"].",".$data["l3"].",".$data["l4"].",".$data["l5"].",".$data["l6"];
        $mardi = "".$data["ma1"].",".$data["ma2"].",".$data["ma3"].",".$data["ma4"].",".$data["ma5"].",".$data["ma6"];
        $mercredi = "".$data["me1"].",".$data["me2"].",".$data["me3"].",".$data["me4"];
        $jeudi = "".$data["j1"].",".$data["j2"].",".$data["j3"].",".$data["j4"].",".$data["j5"].",".$data["j6"];
        $vendredi = "".$data["v1"].",".$data["v2"].",".$data["v3"].",".$data["v4"].",".$data["v5"].",".$data["v6"];

        $planning = ['lundi' => $lundi, 'mardi' => $mardi, 'mercredi' => $mercredi, 'jeudi' => $jeudi, 'vendredi' => $vendredi];


        $is_stored_in_db = $this->dao->update($id, $planning);
        if ($is_stored_in_db) {
            $enfantDAO = new EnfantDAO();
            $enfant = $enfantDAO->fetch($data["enfant_id"], false);
            $this->show($enfant->pk);
        } else {
            echo "Erreur";
            return http_response_code(401);
        }
    }

    public function updateForFlag ($id){
        $aidepeda = $this->isLogged();
        $is_updated = $this->dao->updateForFlag($id);
        if($is_updated){
            return true;
        } else {
            return false;
        }
    }


    public function delete($id, $data) {
        $aidepeda = $this->isLogged();


        $aidepedaDAO = new AidePedaDAO();
        $aidepeda = $aidepedaDAO->fetchWhereOne('semainier_id', $data['pk']);

        $toDelete = ['pk'=> $id];

        $this->dao->delete($toDelete);

        $aidepedaController = new AidePedaController();
        $aidepedaController->index();

    }
}