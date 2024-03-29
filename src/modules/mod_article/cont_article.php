<?php

include_once 'modele_article.php';
include_once 'vue_article.php';
include_once('./modules/mod_commentaire/modele_commentaire.php');

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
        } else {
            $this->action = "article";
        }
    }

    public function execadmin(){
       
        switch($this->action){
            case("formArticle"):
                $this->form_ajout();
            break;
            case("insertArticle"):
                $this->ajout();
            break;
            case("formDelete"):
                $this->form_delete_article();
            break;
            case("deleteArticle"):
                $this->delete();
            break;
            case("gererCommentaire"):
                $this->gestionCommentaireRecherche();
            break;
            case("listeCommentaire"):
                $this->gestionCommentaire();
            break;
            case("deleteCommentaire"):
                $this->supprimerCommentaire();
            break;
            case("validationCommentaire"):
                $this->validerCommentaire();
            break;
            
        }
        

    }

    public function exec(){
        
        switch($this->action){
            case("article"):
                $articles = $this->model->getArticles();
                $this->view->listeArticles($articles);
                /* $this->form_recherche();
                $this->model->dernierArticle(); */
            break;
            case("articleRecherche"):
                $this->faireRecherche();
            break;
            case("articleDetails"):
                $this->rechercheDetails();
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
        $this->view->formDelete($this->model->articleGestionRecherche());
    }

    public function form_recherche(){
        $this->view->rechercherArticle($this->model->dernierArticle());
    }

    public function faireRecherche(){
        $this->view->afficherRecherche($this->model->articleRecherche());
    }

    public function gestionCommentaireRecherche(){
        $this->view->listeArticleCommentaire($this->model->articleRechercheCommentaire());
    }

    public function rechercheDetails(){
        $this->view->articleDetails($this->model->articleRechercheDetails($_GET['id']),$this->modelCom->voirCommentaire($_GET['id']));
    }

    public function gestionCommentaire(){
        $this->view->listeCommentaireSup($this->modelCom->voirGestionCommentaire($_GET['id']));
        $this->view->listeCommentaireValid($this->modelCom->voirGestionCommentaire($_GET['id']));

    }

    public function supprimerCommentaire(){
        $this->modelCom->deleteCommentaire();
    }

    public function validerCommentaire(){
        $this->modelCom->validationCommentaire();
    }

    public function afficheMod(){
        return $this->view->getAffichage();
    }

}



?>