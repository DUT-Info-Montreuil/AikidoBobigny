<?php

include_once 'model.article.php';
include_once 'view.article.php';

class ControllerArticle{

    private $view;
    private $model;
    private $action;


    public function __construct(){
        $this->view = new ViewArticle;
        $this->model = new ModelArticle;
        if(isset($_GET['action'])){
            $this->action = $_GET['action'];
        }
    }

    public function exec(){
        $this->view->menu();
        switch($this->action){
            case("formArticle"):
                $this->form_ajout();
            break;
            case("insertArticle"):
                $this->ajout();
            break;
            case("rechercherArticle"):
                $this->form_recherche();
            break;
            case("articleRecherche"):
                $this->faireRecherche();
            break;
        }

    }


    public function form_ajout(){
        $this->view->formArticle();
    }

    public function ajout(){
        $this->model->insertArticle();
    }

    public function form_recherche(){
        $this->view->rechercherArticle();
    }

    public function faireRecherche(){
        $this->view->afficherRecherche($this->model->articleRecherche());
    }




}



?>