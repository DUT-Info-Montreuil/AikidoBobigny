<?php

include_once 'modele_article.php';
include_once 'vue_article.php';
include_once(__DIR__ . '/../mod_commentaires/modele_commentaire.php');


class ContArticle{

    private $view;
    private $model;
    private $action;
    private $modelCom;


    public function __construct(){
        $this->view = new VueArticle;
        $this->model = new ModeleArticle;
        $this->modelCom = new ModeleCommentaire;
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
            case("formDelete"):
                $this->form_delete_article();
            break;
            case("deleteArticle"):
                $this->delete();
            break;
            case("articleDetails"):
                $this->rechercheDetails();
            break;
            case("ajout"):
                $this->modelCom->ajoutCommentaire();
            break;
        }

    }


    public function form_ajout(){
        $this->view->formArticle();
    }

    public function ajout(){
        $this->model->insertArticle();
    }

    public function delete(){
        $this->model->deleteArticle();
    }

    public function form_delete_article(){
        $this->view->formDelete();
    }

    public function form_recherche(){
        $this->view->rechercherArticle();
    }

    public function faireRecherche(){
        $this->view->afficherRecherche($this->model->articleRecherche());
    }

    public function rechercheDetails(){
        $this->view->articleDetails($this->model->articleRechercheDetails($_GET['id']));
    }

}



?>