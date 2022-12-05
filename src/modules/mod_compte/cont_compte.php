<?php

include_once 'modele_compte.php';
include_once 'vue_compte.php';
include_once('./modules/mod_compte/modele_compte.php');

class ContCompte{

    private $view;
    private $model;
    private $action;


    public function __construct(){
        $this->view = new VueCompte;
        $this->model = new ModeleCompte;
        $this->modelCom = new ModeleCompte;
        if(isset($_GET['action'])){
            $this->action = $_GET['action'];
        }
    }

}



?>