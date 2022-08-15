<?php

class AidePedaController extends AbstractController {
    public function __construct () {
        $this->dao = new aidePedaDAO();
    }

    public function index (){
        $aidepeda = $this->isLogged();
        $semainierDAO = new SemainierDAO();
        $semainier = $semainierDAO->fetchAll();
        include('../views/include/header.php');
        include('../views/include/nav.php');
        include('../views/admin/dashboard.php');
        include('../views/include/footer.php');

    }

    public function login ($id, $data) {
        $aidepeda = $this->dao->verify($data);

        if($aidepeda) {
            if($data['route'] != '/aidepeda/logout' ){
                header('Location: '.$data['route']);
            } else {
                header('Location: /');
            }
        } else {
            echo '<script type="text/javascript"> alert("Login ou mot de passe incorrect")</script>';
            header('Location: /');
        }
    }

    public function logout(){
        $this->dao->logout();
        $this->index();
    }

}